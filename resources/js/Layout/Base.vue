<template>

    <Head>
        <title></title>
        <meta content="test..." head-key="description" type="description">
    </Head>

    <voltnav></voltnav>

    <sidebar :activeItem="sidebar"></sidebar>

    <main class="content">

        <topbar></topbar>

        <slot/>

        <voltfooter></voltfooter>
    </main>

</template>

<script>
import voltnav from '@/Layout/Nav'
import sidebar from '@/Layout/Sidebar'
import topbar from '@/Layout/Topbar'
import voltfooter from '@/Layout/Footer'
import {useToast} from "vue-toastification";
import {Inertia} from '@inertiajs/inertia'
import {Head} from '@inertiajs/inertia-vue3'
import { Collapse } from 'bootstrap';

export default {
    components: {
        voltnav,
        sidebar,
        topbar,
        voltfooter,
        Head
    },

    props: {
      sidebar
    },

    setup() {
        Inertia.on('finish', (event) => {
            //necessário quando no modo celular, existe um transição para outra página via inertia.
            var sideBar = document.getElementById('sidebarMenu')
            var bsCollapse = new Collapse(sideBar, {
                toggle: false
            })
            bsCollapse.hide();
          /*
            deve ser aplicado o data-bs-dismiss="modal" na action
            var bsModal = document.getElementsByClassName('modal-backdrop')[0]
            if (bsModal) {
                bsModal.remove();
            }*/
        })

        // Get toast interface
        const toast = useToast();

        // Use it!
        //toast("I'm a toast!");

        // or with options
        //toast.success("My toast content", {
        //    timeout: 2000
        //});
        // These options will override the options defined in the "app.use" plugin registration for this specific toast

        // Make it available inside methods
        return {toast}
    },
    watch: {
        '$page.props.flash.notification': {
            handler() {

                // Dismiss all opened toast immediately
                this.toast.clear();

                if (!this.$page.props.flash.notification) {
                    return;
                }

                this.$page.props.flash.notification.forEach((notification) => {
                    //console.log(notification);

                    this.toast(
                        String(notification.message), {
                            type: notification.level == 'danger' ? 'error' : notification.level// or "success", "error", "default", "info" and "warning"
                        }
                    );
                })
            },
            deep: true,
        },
    }
}
</script>
