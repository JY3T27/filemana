import { createRouter, createWebHistory } from "vue-router"

import Home from "../components/Home.vue"
import FileList from "../Components/FileList.vue"
import UploadFile from "../components/UploadFile.vue"
import NotFound from "../Components/NotFound.vue"

const routes = [
    {
        path:'/',
        name:'Home',
        component: Home
    },
    {
        path:'/list',
        name:'FileList',
        component: FileList
    },
    {
        path:'/upload',
        name:'UploadFile',
        component: UploadFile
    },
    {
        path:'/:pathMatch(.*)*',
        name:'NotFound',
        component: NotFound
    }
]

const router = createRouter ({
    history: createWebHistory(),
    routes
})

export default router
