<template>
    <div class="min-h-full">
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg" alt="Workflow">
                        </div>
                        <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                            <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                            <Link :href="route('categories.index')" :class="{ 'border-indigo-500': $page.url.startsWith('/categories')}" class=" text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium" aria-current="page">Categores</Link>
                            <a :href="route('products.index')" :class="{ 'border-indigo-500': $page.url.startsWith('/products') }" class="text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium" >Products</a>
                        </div>

                    </div>
                </div>
            </div>
        </nav>


        <div class="py-10">
            <alert-box v-if="$page.props.flash?.message"  :success="true" :message="$page.props.flash?.message"></alert-box>
                <slot></slot>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import AlertBox from '../Components/AlertBox.vue';
// const props = defineProps({
//     success: String
// });
// console.log($page.props);
</script>
