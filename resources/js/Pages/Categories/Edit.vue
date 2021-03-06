<template>
  <header>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1
        class="text-3xl font-bold leading-tight text-gray-900"
        v-text="`Edit ${category.title}`"
      />
    </div>
  </header>
  <main>
    <div class="max-w-7xl mx-auto mt-8 sm:px-6 lg:px-8">
      <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">
                Category
              </h3>

              <p class="mt-1 text-sm text-gray-600">
                Edit the category by updating the title and adescription
              </p>
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form
              @submit.prevent="
                form.patch(
                  route('categories.update', { category: props.category.id }),
                )
              "
            >
              <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                  <div class="">
                    <label
                      for="category-title"
                      class="block text-sm font-medium text-gray-700"
                    >
                      Title
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <input
                        v-model="form.title"
                        type="text"
                        id="category-title"
                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm"
                        :class="
                          form.errors.title
                            ? 'border-red-500'
                            : 'border-gray-300'
                        "
                        placeholder="Title"
                        :aria-errormessage="form.errors.title"
                      />
                    </div>
                    <p class="text-red-500 text-xs italic">
                      {{ form.errors.title }}
                    </p>
                  </div>

                  <div>
                    <label
                      for="category-description"
                      class="block text-sm font-medium text-gray-700"
                    >
                      Description
                    </label>
                    <div class="mt-1">
                      <textarea
                        v-model="form.description"
                        id="category-description"
                        rows="3"
                        :class="
                          form.errors.description
                            ? 'border-red-500'
                            : 'border-gray-300'
                        "
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                        placeholder="Description"
                      ></textarea>
                    </div>
                    <p class="text-red-500 text-xs italic">
                      {{ form.errors.description }}
                    </p>
                    <p class="mt-2 text-sm text-gray-500">
                      Brief description for the category.
                    </p>
                  </div>
                </div>
                <div
                  class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex flex-row-reverse"
                >
                  <div class="flex">
                    <button
                      type="submit"
                      class="inline-flex ml-2 justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                      Update
                    </button>
                  </div>
                  <div class="flex">
                    <form
                      @submit.prevent="
                        form.delete(
                          route('categories.destroy', {
                            category: props.category.id,
                          }),
                        )
                      "
                    >
                      <button
                        type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                      >
                        Delete
                      </button>
                    </form>
                  </div>
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
import { Inertia } from '@inertiajs/inertia'
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
  category: {
    type: Object,
    required: true,
  },
  success: {
    type: String,
    required: false,
  },
  errors: {
    type: Object,
    required: false,
  },
})

const form = useForm({
  title: props.category.title,
  description: props.category.description,
})
// form.errors = props.errors;
</script>
