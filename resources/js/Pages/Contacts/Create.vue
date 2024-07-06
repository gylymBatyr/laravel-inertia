<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, Link, router, useForm   } from '@inertiajs/vue3';
import { reactive } from 'vue'


const { props } = usePage();

const form = reactive({
    name: null,
    phone: null,
})

function submit() {
    router.post('/contacts', form)
}


</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-gray-900">
                    <form @submit.prevent="submit">
                        <div class="m-4">
                            <div>
                                <label for="name" class="block font-medium text-sm text-gray-700">
                                    Name
                                </label>
                                <input v-model="form.name" type="text" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="John Doe">
                            </div>
                            <div class="mt-2">
                                <label for="phone" class="block font-medium text-sm text-gray-700">
                                    Phone
                                </label>
                                <input v-model="form.phone" type="text" id="phone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Phone">
                            </div>
                        </div>

                        <div class="py-4">
                            <button type="submit" class="ml-4 inline-block px-4 py-3 bg-blue-500 text-white rounded mb-4">
                                Save post
                            </button>
                            <Link :href="route('dashboard')" class="ml-2 inline-block px-4 py-3 bg-gray-200 rounded">
                                Cancel
                            </Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>
    .btn{
        margin-left: 10px;
    }
</style>
