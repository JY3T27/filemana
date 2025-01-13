<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    errors: Object,
    filedata: Object,
})

const form = useForm({
    _method: 'put',
    file: null,
    file_name: props.filedata.file_name,
    file_type: props.filedata.file_type,
    file_size: props.filedata.file_size,
    user_id: props.filedata.user_id,
});

const updateFile = () => {
    form.post(route('filedata.update', props.filedata.id), {
    onSuccess: () => {
        form.reset();
    }
});
}

</script>

<template>
    <Head title="Edit File" />
    <AuthenticatedLayout>
        <div v-if="$page.props.flash.message" class="alert">
            {{ $page.props.flash.message }}
        </div>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Edit File
                </h2>
            </div>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="updateFile" enctype="multipart/form-data">
                            <div>
                                <label>File Name:</label>
                                <input type="text" v-model="form.file_name" class="py-1 w-full" disabled />
                            </div>
                            <div>
                                <label>File Type:</label>
                                <input type="text" v-model="form.file_type" class="py-1 w-full" disabled />
                            </div>
                            <div>
                                <label>File Size:</label>
                                <input type="text" v-model="form.file_size" class="py-1 w-full" disabled />
                            </div>
                            <div>
                                <label>Upload New File:</label>
                                <input
                                    type="file"
                                    id="file"
                                    @change="form.file = $event.target.files[0]"
                                    class="border p-2 w-full"
                                />
                            </div>
                            <button
                                type="submit"
                                class="mt-4 bg-black text-white px-4 py-2 rounded"
                                :disabled="form.processing"
                            >
                                <span v-if="form.processing">Updating...</span>
                                <span v-else>Update</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
/* Add any additional styling as needed */
</style>

