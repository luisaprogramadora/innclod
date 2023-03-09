
import {createWebHistory, createRouter} from "vue-router";
import ExampleComponent from '../components/ExampleComponent.vue';


const routes = [
    {
        path: '/home',
        name: 'home',
        component: ExampleComponent
    }
]

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

export default router;