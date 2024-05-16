<template>
    <Layout sidebar="sobre">
        <Head title="Criar Time"/>

        <PageInfo
            pageIcon="fa fa-plus"
            pageTitle="Novo Time"
        >
        </PageInfo>

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
                                    <label for="cidade" class="form-label">Cidade:</label>
                                    <input type="text" class="form-control" id="cidade" v-model="form.cidade">
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
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import {useForm} from "@inertiajs/inertia-vue3";

// Variáveis reativas para armazenar os dados do novo time
// const nome = ref('');
// const ano_fundacao = ref('');
// const cidade = ref('');


const form = useForm({
    nome: null,
    ano_fundacao: 0,
    cidade: null,

})
const router = useRouter();

// Função para criar um novo time
const criarTime = async () => {
    // // Requisição POST para enviar os dados do novo time para o servidor
    // const response = await fetch('/times', {
    //     method: 'POST',
    //     headers: {
    //         'Content-Type': 'application/json',
    //     },
    //     body: JSON.stringify({
    //         nome: nome.value,
    //         ano_fundacao: parseInt(ano_fundacao.value),
    //         cidade: cidade.value,
    //     }),
    // });


    form.post(route('times.store'))

    // Verificar se a requisição foi bem-sucedida
    if (response.success) {
        // Redirecionar para a página de listagem de times após criar o novo time
        router.push('/Times/Times');
    } else {
        // Exibir mensagem de erro
        console.error('Erro ao criar o time');
    }
};
</script>
