<script setup>
</script>

<template>
  <Layout sidebar="manual_menus">

    <Head title="Menus"/>

    <PageInfo
      pageIcon="fa fa-bolt"
      pageTitle="Menus"
    >
    </PageInfo>

    <div class="container-fluid pt-2">

      <div class="box box-primary">

        <div class="box-header with-border">
          <img src="/manual/menus.jpg">

          <div class="my-2">
            Os menus são definidos no arquivo app/menu.php e tem a seguinte estrutura:
            <pre>
              [
                'id' => 'volt_sobre',
                'url' => '/volt/sobre',
                'title' => 'Sobre',
                'icon' => 'fa fa-bolt',
                'can' => true,
                'subitems' => [
                  [
                    'id' => ...
                    'url' => ...
                    'icon => ...
                    'can' => ...
                  ]
                ]
              ]
            </pre>
          </div>

          <ul>
            <li>
              O atributo id serve para identificar qual menu deve estar ativo; Este id deve ser utilizado na props 'sidebar' do componente Layout:
              <code>
                Layout sidebar="manual_menus">
              </code>
            </li>

            <li>
              O atribute "can" pode ser utilizado para exibir, ou não, o menu para um determinado usuário.<br>
              Este atributo pode ser utilizado em conjunto com os <a href="https://laravel.com/docs/8.x/authorization#gates" target="_blank">Gates</a> do Laravel!
            </li>

            <li>
              Os menus são carredas uma única vez, no boot da aplicação no RouteServiceProvider.
            </li>

          </ul>

        </div>

      </div>

    </div>
  </Layout>
</template>

