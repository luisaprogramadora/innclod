
import './bootstrap';
import { createApp } from 'vue';
import {createWebHistory, createRouter} from "vue-router";

const app = createApp({});
import DocumentoComponent from './components/DocumentoComponent.vue';
import TipoDocumento from './components/TipoDocumentoComponent.vue';
import Proceso from './components/ProcesoComponent.vue';
import MiDocumento from './components/MisDocumentosComponent.vue';
import EditarDocumentoComponent from './components/EditarDocumentoComponent.vue';
import NavComponent from './components/NavComponent.vue';
app.component('example-component', DocumentoComponent);

const routes = [
    {
        path: '/',
        name: 'documento',
        component: MiDocumento
    },
    {
        path: '/crear_documento',
        name: 'crear_documento',
        component: DocumentoComponent
    },
    {
        path: '/tipo_documento',
        name: 'tipo_documento',
        component: TipoDocumento
    },
    {
        path: '/proceso',
        name: 'proceso',
        component: Proceso
    },
    {
        path: '/mis_documentos',
        name: 'mis_documentos',
        component: MiDocumento
    },
    {
        path: '/editar_documento',
        name: 'editar_documento',
        component: EditarDocumentoComponent
    },
]

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});
 app.use(router)

app.mount('#app');
