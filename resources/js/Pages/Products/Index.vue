<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Head } from "@inertiajs/inertia-vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import Product from "@/Components/Product.vue";

defineProps(["products"]);

const form = useForm({
  name: "",
  code: "",
  price: "",
  image: "",
});
</script>
 
<template>
  <Head title="Products" />

  <AuthenticatedLayout>
    <div class="w-full mt-10 shadow-sm rounded-lg divide-y">
      <div class="max-w-3xl mx-auto">
        <div class="relative overflow-x-auto sm:rounded-lg">
          <table class="w-full text-left text-gray-500 dark:text-gray-400">
            <thead
              class="
                text-xs text-gray-700
                uppercase
                bg-gray-50
                dark:bg-gray-700 dark:text-gray-400
              "
            >
              <tr>
                <th scope="col" class="px-6 py-3">Nome Produto</th>
                <th scope="col" class="px-6 py-3">Código</th>
                <th scope="col" class="px-6 py-3">Preço</th>
                <th scope="col" class="px-6 py-3">Imagem</th>
                <th scope="col" class="px-6 py-3">Ações</th>
              </tr>
            </thead>
            <tbody>
              <Product
                v-for="product in products"
                :key="product.id"
                :product="product"
              />
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>