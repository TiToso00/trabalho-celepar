<template>

  <Layout sidebar="manual_layout_da_pagina">

    <Head title="Layout da Página"/>

    <PageInfo
      pageIcon="fa fa-bolt"
      pageTitle="Layout da Página"
    >
    </PageInfo>


    <div class="container-fluid pt-2">

      <div class="box box-primary">

        <div class="box-header with-border">
          <img src="/manual/layout_da_pagina.jpg">

          <div class="my-2">
            <ul>
              <li>1 - Inicie a criação do seu componente utilizando o componente Layout. Este componente irá renderezidar o layout principal da aplicação: header, menus, footer.</li>
              <li>2 - A tag Head é utiliada para definir a string que será exibida na aba do navegar.</li>
              <li>3- O componente PageInfo é responsável por apresentar o ícone da página, bem como seu título. Ainda é possível utiliar a prop "back". Esta prop deve receber uma url e é utilizada da mesma maneira como o back do navegador.</li>
            </ul>
          </div>

        </div>

      </div>

    </div>



  </Layout>

</template>

