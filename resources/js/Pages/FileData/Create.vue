<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    errors:Object
})

const form = useForm({
    file: null,
    file_name: '',
    file_type: '',
    file_size: 0,
    user_id: null, // To store the user ID
});

const handleFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.file = file;
        form.file_name = file.name;
        form.file_type = file.type;
        form.file_size = file.size;
        form.user_id = form.user_id || 1; // You can set this dynamically if the user is logged in
    }
};

const uploadFile = () => {
    const formData = new FormData();
    formData.append('file', form.file);
    formData.append('file_name', form.file_name);
    formData.append('file_type', form.file_type);
    formData.append('file_size', form.file_size);
    formData.append('user_id', form.user_id); // Add the user ID to the form data

    // Send data to the server
    form.post(route('filedata.store'), {
        data: formData,
        onFinish: () => form.reset(),
    });
};
</script>


<template>
    <Head title="Upload File" />

    <AuthenticatedLayout>

        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Upload File
                </h2>
            </div>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="uploadFile" enctype="multipart/form-data">
                            <div>
                                <label for="file">Upload File:</label>
                                <input
                                    type="file"
                                    id="file"
                                    @change="handleFileChange"
                                    class="border p-2 w-full"
                                />
                                <div v-if="errors.file" class="text-red-500">{{ errors.file }}</div>
                            </div>
                            <div v-if="file">
                                <p><strong>File Type:</strong> {{ file.type }}</p>
                                <p><strong>File Size:</strong> {{ formatFileSize(file.size) }}</p>
                            </div>
                            <button type="submit" :disabled="form.processing" class="mt-4 bg-black text-white px-4 py-2 rounded">
                                <span v-if="form.processing">Uploading</span>
                                <span v-else>Upload</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
  data() {
    return {
      file: null, // Stores the uploaded file
    };
  },
  methods: {
    handleFileChange(event) {
      // Get the selected file
      this.file = event.target.files[0];
    },
    formatFileSize(size) {
      // Convert size in bytes to a more readable format (e.g., KB, MB)
      if (size < 1024) return `${size} bytes`;
      if (size < 1024 * 1024) return `${(size / 1024).toFixed(2)} KB`;
      return `${(size / (1024 * 1024)).toFixed(2)} MB`;
    },
    uploadFile() {
      if (!this.file) {
        alert('Please select a file to upload.');
        return;
      }

      // Submit the file to the server
      // Add your API request or Laravel endpoint logic here
      alert(`File "${this.file.name}" uploaded successfully.`);
    },
  },
};
</script>

<style scoped>
/* Add any additional styling as needed */
</style>
