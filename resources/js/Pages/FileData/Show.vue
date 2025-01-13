<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    errors: Object,
    filedata: Object,
})

</script>

<template>
    <Head title="Show File" />
    <AuthenticatedLayout>
        <div v-if="$page.props.flash.message" class="alert">
            {{ $page.props.flash.message }}
        </div>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Show File
                </h2>
            </div>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <p><strong>File Name:</strong><br> {{ filedata.file_name }}</p>
                            <p><strong>File Type:</strong><br> {{ filedata.file_type }}</p>
                            <p><strong>File Size:</strong><br> {{ filedata.file_size }} bytes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
/* Add any additional styling as needed */
</style>

