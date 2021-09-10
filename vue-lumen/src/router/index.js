import {createRouter, createWebHistory} from "vue-router";

import Students from "../components/Students.vue";
import AddStudent from "../components/AddStudent.vue";
import UpdateStudent from "../components/UpdateStudent.vue";

const routes = [
    {   
        path: '/',
        name: 'home',
        component: Students
    },
    {
        path: '/add',
        name: 'add',
        component: AddStudent
    },
    {
        path: '/edit/:id',
        name: 'edit',
        component: UpdateStudent
    }
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

export default router;