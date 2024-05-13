<template>

  <Layout sidebar="volts.index">

    <Head title="Editar Volt"/>

    <PageInfo
      :back="route('volts.index')"
      pageIcon="fa fa-keyboard-o"
      pageTitle="Editar Volt"
    >
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <Link :href="route('volts.index')">
              Volts
            </Link>
          </li>
          <li class="breadcrumb-item active">
            Editando volt {{ volt.name }}
          </li>
        </ol>
      </nav>

    </PageInfo>

    <div class="container pt-2">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h4>Dados do Volt!</h4>
        </div>

        <div class="box-body">
          <form @submit.prevent="submit">

            <volt-form :form="form" :medias="medias" :proprietarios="proprietarios" :reset="reset" @reseted="reset = false"/>

            <div class="d-flex justify-content-between">
              <div>
                <LoadingButton :loading="form.processing" class="btn btn-primary" disable-with="Salvando..." type="submit">
                  Salvar
                </LoadingButton>

                <!--
                <Link v-if="volt.status" :href="route('volt.inativar', volt.id)" as="button"
                      class="btn btn-warning"
                      method="put" type="button">Inativar
                </Link>
                <Link v-else :href="route('volt.ativar', volt.id)" as="button" class="btn btn-success"
                      method="put"
                      type="button">Ativar
                </Link>
                -->
              </div>

              <div>
                <!--
                                <Confirmation id='confirm_destroy_volt' buttonClass="btn btn-danger"
                                  confirm="Tem certeza que deseja apagar este volt?" value="Apagar">
                                  <Link :disabled="form.processing" :href="route('volt.destroy', volt.id)" as="button"
                                    class="btn btn-danger" method="delete">
                                    Apagar
                                  </Link>
                                </Confirmation>
                -->
                <!--
                                <Link :disabled="form.processing" :href="route('volt.destroy', volt.id)" as="button"
                                  class="btn btn-danger" method="delete">
                                  Apagar
                                </Link>
                -->
                <button :disabled="deleting" class="btn btn-danger" @click.prevent="destroy">
                  Apagar
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </Layout>
</template>

<script setup>

import PageInfo from "@/Layout/PageInfo"
import { Inertia } from "@inertiajs/inertia";
import VoltForm from "@/Pages/Volt/Partials/VoltForm";
import { Link, useForm } from '@inertiajs/inertia-vue3'
import FilePondInput from '@/Components/FilePondInput'
import { ref } from 'vue'
import LoadingButton from "@/Shared/LoadingButton";

const props = defineProps({
  volt: Object,
  medias: Array,
  proprietarios: Object
})

let deleting = false

const reset = ref(false);

const form = useForm({
  _method: 'put',
  name: props.volt.name,
  status: props.volt.status,
  proprietario_id: props.volt.proprietario_id,
  anexos: Array,
})

function submit() {
  form.post(route('volts.update', props.volt.id), {
    preserveScroll: false,
    onSuccess: () => reset.value = true,
  })
}

function clearUploads() {
  reset.value = true
}

function destroy() {
  if (confirm('Are you sure you want to delete this volt?')) {
    deleting = true;
    Inertia.delete(route('volts.destroy', props.volt.id))
  }
}

</script>
