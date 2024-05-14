<template>
    <Layout sidebar="sobre">
        <Head title="Times"/>

        <PageInfo
            pageIcon="fa fa-bolt"
            pageTitle="Times"
        >
        </PageInfo>

        <div class="container-fluid pt-2">

            <div class="box box-primary">

                <div class="box-header with-border d-flex justify-content-between align-items-center">
                    <h4>
                        Listagem de
                    </h4>
                    <!-- Botão para adicionar um novo time -->
                    <button @click="criarNovoTime" class="btn btn-primary">
                        Novo
                    </button>
                </div>

                <div class="box-body">
                    <!-- Tabela de times -->
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Ano de Fundação</th>
                            <th scope="col">Cidade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Substitua esta linha pela repetição dos dados dos times -->
                        <tr>
                            <td>Nome do Time</td>
                            <td>2000</td>
                            <td>Cidade do Time</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </Layout>
</template>

<script setup>
import { useRouter } from 'vue-router';

// Função para criar um novo time
const criarNovoTime = () => {
    const router = useRouter();
    // Redirecionar para a página de criação de time
    router.push('/novo-time');
};
</script>
