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
                    <h4>Listagem de Times</h4>
                    <button @click="irParaCriarTime" class="btn btn-primary">Novo</button>
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Ano de Fundação</th>
                            <th scope="col">Cidade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="time in times" :key="time.id">
                            <td>{{ time.nome }}</td>
                            <td>{{ time.ano_fundacao }}</td>
                            <td>{{ time.cidade }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>


const props = defineProps({
    times: Object,
})

const irParaCriarTime = () => {
    window.location.href = '/times/create';
};


</script>
