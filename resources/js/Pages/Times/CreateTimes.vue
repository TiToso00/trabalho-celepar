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
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <Autocomplete
                                        v-model="form.cidade"
                                        :search="searchLocalidade"
                                        placeholder="Digite a cidade"
                                        debounce="300"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="ano_fundacao" class="form-label">Ano de Fundação:</label>
                                    <input type="number" class="form-control" id="ano_fundacao" v-model="form.ano_fundacao">
                                </div>
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome do Time:</label>
                                    <Autocomplete
                                        v-model="form.nome"
                                        :search="searchTimesBrasileiros"
                                        placeholder="Digite o nome do time"
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
    cidade: '',
    ano_fundacao: '',
    nome: '',
});

const router = useRouter();

const criarTime = async () => {
    try {
        const response = await axios.post('/times', {
            cidade: form.cidade,
            ano_fundacao: form.ano_fundacao,
            nome: form.nome,
        });
        if (response.status === 201) {
            router.push('/times');
        } else {
            console.error('Erro ao criar o time:', response.data);
        }
    } catch (error) {
        if (error.response && error.response.status === 422) {
            console.error('Erro de validação:', error.response.data.errors);
        } else {
            console.error('Erro ao criar o time:', error);
        }
    }
};

const searchLocalidade = async (query) => {
    if (query.length < 2) return [];
    try {
        const response = await axios.get(`/api/cidades/${query}`);
        return response.data;
    } catch (error) {
        console.error('Erro ao buscar localidades:', error);
        return [];
    }
};

const searchTimesBrasileiros = async (query) => {
    if (query.length < 2) return [];
    try {
        const response = await axios.get('/times-brasileiros.json');
        const times = response.data.map(time => time.nome);
        return times.filter(time => time.toLowerCase().includes(query.toLowerCase()));
    } catch (error) {
        console.error('Erro ao buscar times brasileiros:', error);
        return [];
    }
};
</script>

<style scoped>
.autocomplete-results {
    max-height: 200px;
    overflow-y: auto;
    border: 1px solid #ced4da;
    border-top: none;
    border-radius: 0 0 5px 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.autocomplete-result {
    padding: 8px 12px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.autocomplete-result:hover {
    background-color: #f8f9fa;
}

.city:hover {
    color: red;
}
</style>
