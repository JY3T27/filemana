<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import dayjs from 'dayjs';

defineProps({
    filedata: Array,
})

const form = useForm({});

const deleteFile = (fileId) =>{
    if (confirm('Confirm to delete file?')) {
        form.delete(route('filedata.destroy', fileId));
    }
}
</script>

<template>
    <Head title="FileData" />

    <AuthenticatedLayout>
        <template #header>
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            File Management
        </h2>
        <Link
            :href="route('filedata.create')"
            class="px-4 py-2 text-sm font-medium text-white bg-black rounded hover:bg-gray-800 transition"
        >
            Create
        </Link>
    </div>
</template>
        <div v-if="$page.props.flash.message" class="alert mx-auto max-w-7xl sm:px-6 lg:px-8 bg-green-200 mt-4 mx-5 px-4 py-2">
            {{ $page.props.flash.message }}
        </div>
        <div class="py-7">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mt-4 mx-4">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Size (bytes)</th>
                                        <th>Uploaded By</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example data rows -->
                                    <tr
                                        v-for="(item, index) in filedata"
                                        :key="index"
                                    >
                                        <td>{{ item.id }}</td>
                                        <td>{{ item.file_name }}</td>
                                        <td>{{ item.file_type }}</td>
                                        <td>{{ item.file_size }}</td>
                                        <td>{{ item.user_id }}</td>
                                        <td>{{ dayjs(item.created_at).format('DD-MM-YYYY HH:mm:ss') }}</td>
                                        <td>{{ dayjs(item.updated_at).format('DD-MM-YYYY HH:mm:ss') }}</td>
                                        <td>
                                            <Link :href="route('filedata.show', item.id)" class="hover:underline">
                                                Show
                                            </Link>
                                            <Link :href="route('filedata.edit', item.id)" class="hover:underline">
                                                Edit
                                            </Link>
                                            <button
                                                type="submit"
                                                @click="deleteFile(item.id)"
                                                class="hover:underline"
                                            >
                                                Delete
                                        </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
