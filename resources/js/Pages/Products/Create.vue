<template>
  <header>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold leading-tight text-gray-900">
        Create category
      </h1>
    </div>
  </header>
  <main>
    <div class="max-w-7xl mx-auto mt-8 sm:px-6 lg:px-8">
      <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">
                Product
              </h3>
              <p class="mt-1 text-sm text-gray-600">
                Create a new product by adding a title and a description
              </p>
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="form.post(route('products.store'))">
              <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                  <div class="">
                    <label
                      for="product-title"
                      class="block text-sm font-medium text-gray-700"
                    >
                      Title
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <input
                        v-model="form.title"
                        type="text"
                        id="product-title"
                        :class="
                          form.errors.title
                            ? 'border-red-500'
                            : 'border-gray-500'
                        "
                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm"
                        placeholder="Title"
                      />
                    </div>
                    <p class="text-red-500 text-xs italic">
                      {{ form.errors.title }}
                    </p>
                  </div>

                  <div>
                    <label
                      for="product-description"
                      class="block text-sm font-medium text-gray-700"
                    >
                      Description
                    </label>
                    <div class="mt-1">
                      <textarea
                        v-model="form.description"
                        id="product-description"
                        rows="3"
                        :class="
                          form.errors.description
                            ? 'border-red-500'
                            : 'border-gray-500'
                        "
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border rounded-md"
                        placeholder="Description"
                      ></textarea>
                    </div>
                    <p class="text-red-500 text-xs italic">
                      {{ form.errors.description }}
                    </p>

                    <p class="mt-2 text-sm text-gray-500">
                      Brief description for the product.
                    </p>
                  </div>
                  <div>
                    <label
                      for="product"
                      class="block text-sm font-medium text-gray-700"
                    >
                      Select category
                    </label>
                    <div class="mt-1">
                      <select
                        v-model="form.category_id"
                        id="countries"
                        :class="
                          form.errors.category_id
                            ? 'border-red-500'
                            : 'border-gray-500'
                        "
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border rounded-md"
                      >
                        <option
                          class="mt-2 text-sm text-gray-500"
                          :value="null"
                        >
                          Choose a category
                        </option>
                        <option
                          v-for="category in props.categories"
                          :key="category.id"
                          :value="category.id"
                          v-text="category.title"
                        ></option>
                      </select>
                    </div>
                    <p class="text-red-500 text-xs italic">
                      {{ form.errors.category_id }}
                    </p>
                  </div>
                  <div class="">
                    <label
                      for="product-price"
                      class="block text-sm font-medium text-gray-700"
                    >
                      Price
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <input
                        v-model="form.price"
                        type="number"
                        id="product-price"
                        :class="
                          form.errors.price
                            ? 'border-red-500'
                            : 'border-gray-500'
                        "
                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm"
                        placeholder="Price"
                      />
                    </div>
                    <p class="text-red-500 text-xs italic">
                      {{ form.errors.price }}
                    </p>
                  </div>

                  <div class="mt-1">
                    <label
                      for="product-price"
                      class="block text-sm font-medium text-gray-700"
                    >
                      In Stock
                    </label>
                    <div class="flex items-center mb-4">
                      <input
                        id="default-radio-1"
                        v-model="form.in_stock"
                        type="radio"
                        value="1"
                        name="default-radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                      />
                      <label
                        for="default-radio-1"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                      >
                        Yes
                      </label>
                    </div>
                    <div class="flex items-center">
                      <input
                        checked
                        id="default-radio-2"
                        v-model="form.in_stock"
                        type="radio"
                        value="0"
                        name="default-radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                      />
                      <label
                        for="default-radio-2"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                      >
                        No
                      </label>
                    </div>
                    <p class="text-red-500 text-xs italic">
                      {{ form.errors.in_stock }}
                    </p>
                  </div>
                  <div>
                    <div>
                      <label
                        for="product-image"
                        class="block text-sm font-medium text-gray-700"
                      >
                        Product image
                      </label>
                      <input
                        class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        :class="
                          form.errors.image
                            ? 'border-red-500'
                            : 'border-gray-500'
                        "
                        id="product_image"
                        v-on:input="form.image = $event.target.files[0]"
                        type="file"
                      />
                    </div>
                    <p class="text-red-500 text-xs italic">
                      {{ form.errors.image }}
                    </p>
                  </div>
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <button
                    type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                  >
                    Create
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import { computed } from '@vue/runtime-core'
const props = defineProps({
  categories: {
    type: Array,
    required: true,
  },
  errors: {
    type: Object,
    required: false,
  },
})
const form = useForm({
  title: '',
  description: '',
  category_id: null,
  price: '',
  in_stock: 1,
  image: '',
})
</script>
