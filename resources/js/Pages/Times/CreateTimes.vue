<template>
    <Layout sidebar="sobre">
        <Head title="Criar Time"/>

        <PageInfo
            pageIcon="fa fa-plus"
            pageTitle="Novo Time"
        />

        <div class="container pt-2">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <form @submit.prevent="criarTime">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome do Time:</label>
                                    <input type="text" class="form-control" id="nome" v-model="form.nome">
                                </div>
                                <div class="mb-3">
                                    <label for="ano_fundacao" class="form-label">Ano de Fundação:</label>
                                    <input type="number" class="form-control" id="ano_fundacao" v-model="form.ano_fundacao">
                                </div>
                                <div class="mb-3">
                                    <label for="cidade" class="form-label">Cidade ou Time:</label>
                                    <Autocomplete
                                        v-model="form.cidade"
                                        :search="searchLocalidadesETimes"
                                        placeholder="Digite a cidade ou time"
                                        debounce="300"
                                    />
                                </div>
                                <button type="submit" class="btn btn-primary">Criar Time</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { useRouter } from 'vue-router';
import { useForm } from "@inertiajs/inertia-vue3";
import axios from 'axios';
import Autocomplete from '@trevoreyre/autocomplete-vue';

const form = useForm({
    nome: '',
    ano_fundacao: 0,
    cidade: '',
})

const router = useRouter();

const criarTime = async () => {
    const response = await form.post(route('times.store'))
    if (response.success) {
        router.push('/Times/Times');
    } else {
        console.error('Erro ao criar o time');
    }
};

const searchLocalidade = async (query) => {
    if (query.length < 2) return [];
    try {
        const response = await axios.get(`https://servicodados.ibge.gov.br/api/v1/localidades/municipios`);
        const localidades = response.data.map(localidade => localidade.nome);
        return localidades.filter(localidade => localidade.toLowerCase().includes(query.toLowerCase()));
    } catch (error) {
        console.error('Erro ao buscar localidades:', error);
        return [];
    }
};

const searchTimesCartola = async (query) => {
    try {
        const response = await axios.get(`https://api.cartolafc.globo.com/clubes`);
        const times = response.data.map(time => time.nome);
        return times.filter(time => time.toLowerCase().includes(query.toLowerCase()));
    } catch (error) {
        console.error('Erro ao buscar times pelo Cartola FC:', error);
        return [];
    }
};

const searchLocalidadesETimes = async (query) => {
    const cidades = await searchLocalidade(query);
    const timesCartola = await searchTimesCartola(query);
    return [...cidades, ...timesCartola];
};
</script>

<style scoped>
/* Adicione estilos específicos se necessário */
</style>
