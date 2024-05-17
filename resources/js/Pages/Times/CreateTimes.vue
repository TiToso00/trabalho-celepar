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
                            <div class="mb-3">
                                <label for="cidade" class="form-label">Cidade ou Time:</label>
                                <Autocomplete
                                    v-model="form.cidade"
                                    :search="searchLocalidadesETimes"
                                    placeholder="Digite a cidade ou time"
                                    debounce="300"
                                />
                            </div>
                                <div class="mb-3">
                                    <label for="ano_fundacao" class="form-label">Ano de Fundação:</label>
                                    <input type="number" class="form-control" id="ano_fundacao" v-model="form.ano_fundacao">
                                </div>

                            <form @submit.prevent="criarTime">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome do Time:</label>
                                    <input type="text" class="form-control" id="nome" v-model="form.nome">
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
import {useRouter} from 'vue-router';
import {useForm} from "@inertiajs/inertia-vue3";
import axios from 'axios';
import Autocomplete from '@trevoreyre/autocomplete-vue';

const form = useForm({
    nome: '',
    ano_fundacao: 0,
    cidade: '',
});

const router = useRouter();

const criarTime = async () => {
    try {
        const response = await form.post(route('times.store'));
        if (response.success) {
            router.push('/Times/Times');
        } else {
            console.error('Erro ao criar o time');
        }
    } catch (error) {
        console.error('Erro ao criar o time:', error);
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

const searchTimesBrasileiros = async (query) => {
    try {
        const token = 'w4vDBeJiyzyvSnUXyLB7T4gRy1N9vTebjMmNWuh5ZgFUhjGk4WJFJ7BKPNQV'; // Insira seu token aqui
        const response = await axios.get('https://api.sportmonks.com/v2.0/teams', {
            params: {
                include: 'country',
                filter: {country_id: 39}, // ID do Brasil (39)
                api_token: token
            }
        });
        const times = response.data.data.map(time => time.name);
        return times.filter(time => time.toLowerCase().includes(query.toLowerCase()));
    } catch (error) {
        console.error('Erro ao buscar times brasileiros:', error);
        return [];
    }
};

const searchLocalidadesETimes = async (query) => {
    const cidades = await searchLocalidade(query);
    const timesBrasileiros = await searchTimesBrasileiros(query);
    return [...cidades, ...timesBrasileiros];
};
</script>

<style scoped>
.autocomplete-results {
    max-height: 200px;
    overflow-y: auto;
    border: 1px solid #ced4da;
    border-top: none;
    border-radius: 0 0 5px 5px; /* Adiciona borda arredondada apenas na parte inferior */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Adiciona sombra para destacar a lista */
}

.autocomplete-result {
    padding: 8px 12px;
    cursor: pointer;
    transition: background-color 0.3s; /* Adiciona uma transição suave na mudança de cor de fundo */
}

.autocomplete-result:hover {
    background-color: #f8f9fa; /* Altera a cor de fundo ao passar o mouse */
}

.city:hover {
    color: red; /* Altera a cor do texto para vermelho quando o mouse está sobre cidades */
}
</style>






