<template>
    <Layout sidebar="Times">
        <Head title="Form Index"/>

        <PageInfo
            pageIcon="fa fa-keyboard-o"
            pageTitle="Times "
        >
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        Times
                    </li>
                </ol>
            </nav>
        </PageInfo>

        <div class="container-fluid pt-2">

            <div class="box box-primary">

                <div class="box-header with-border d-flex justify-content-between align-items-center">
                    <h3>Listagem de Times</h3>

                    <Link :href="route('times.create')" as="button" class="btn btn-primary btn-lg d-flex align-items-center gap-1" type="button">
                        <i class="fa fa-plus-circle fa-2x"></i>
                        <span>Novo</span>
                    </Link>

                </div>
            </div>

        </div>














    </Layout>
</template>

<script setup>
import Pagination from "@/Shared/Pagination";
import { useFilter } from "@/Components/Filter/Composables/useFilter";
import { usePersistScroll } from "@/Composables/usePersistScroll";
import { Inertia } from "@inertiajs/inertia";












</script>

<style scoped>
tr.warning {
    background-color: #fff3cd;
}

.pointer {
    cursor: pointer !important;
}
</style>
