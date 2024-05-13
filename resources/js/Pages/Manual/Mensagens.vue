<script setup>
</script>

<template>
  <Layout sidebar="manual_mensagens">

    <Head title="Mensagens"/>

    <PageInfo
      pageIcon="fa fa-bolt"
      pageTitle="Mensagens"
    >
    </PageInfo>

    <div class="container-fluid pt-2">

      <div class="box box-primary">

        <div class="box-header with-border">
          <img src="/manual/mensagens.jpg">

          <div class="my-2">
            Mensagens são feedbacks que precisamos passar para o usuário.<br>
            É utilizado no backend o pacote https://github.com/laracasts/flash<br>
            No controller, basta ter o código:
            <pre>
              flash()->success('Sua mensagem')
            </pre>
            <div>Além do método success, existem os seguintes métodos: error, warning e info</div>
          </div>

          <div class="my-2">
            No frontend é utilizado o pacote: vue-toastification e toda a configuração é realizado no Base.vue
          </div>

          <div class="my-2">
            <Link as="button" class="btn btn-primary" href="/message">
              Experimente!
            </Link>
          </div>

        </div>
      </div>

    </div>
  </Layout>
</template>

