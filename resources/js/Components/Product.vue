<script setup>
import Swal from "sweetalert2/dist/sweetalert2";
import "sweetalert2/dist/sweetalert2.css";

import PrimaryButton from "@/Components/PrimaryButton.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import { useForm, Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

import { formatCurrency } from "@brazilian-utils/brazilian-utils";

const form = useForm({
  id: "",
  name: "",
  code: "",
  price: "",
  image: "",
});

defineProps(["product"]);

const editProduct = (id) => {
  form.get(route("products.edit", id));
};

const deleteProduct = (id) => {
  Swal.fire({
    title: "Você tem certeza?",
    text: "O produto será excluído definitivamente!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Sim, excluir!",
  }).then((result) => {
    if (result.value) {
      form.delete(route("products.destroy", id), {
        onSuccess: () =>
          Swal.fire("Excluído", "Produto removido com sucesso!", "success"),
        onError: () =>
          Swal.fire("Falhou!", "Algo de errado aconteceu.", "Warning"),
      });
    }
  });
};
</script>
 
<template>
  <tr
    class="
      bg-white
      border-b
      dark:bg-gray-800 dark:border-gray-700
      hover:bg-gray-50
      dark:hover:bg-gray-600
    "
  >
    <td class="px-6 py-4">{{ product.name }}</td>
    <td class="px-6 py-4">{{ product.code }}</td>
    <td class="px-6 py-4">{{ formatCurrency(product.price / 100) }}</td>
    <td class="px-6 py-4">
      <img
        v-if="product.image"
        :src="`/storage/${product.image}`"
        :alt="product.name"
        class="h-15 w-20 object-cover"
      />
    </td>

    <td class="px-6 py-4 text-right">
      <form>
        <Link
          as="button"
          type="button"
          :href="route('products.edit', product.id)"
          class="
            font-medium
            text-blue-600
            dark:text-blue-500
            hover:underline
            inline-flex
            items-center
            px-4
            py-2
            bg-gray-800
            border border-transparent
            rounded-md
            font-semibold
            text-xs text-white
            uppercase
            tracking-widest
            hover:bg-gray-700
            active:bg-gray-900
            focus:outline-none focus:border-gray-900 focus:shadow-outline-gray
            transition
            ease-in-out
            duration-150
          "
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
            />
          </svg>
        </Link>
      </form>

      <form @submit.prevent="deleteProduct(product.id)">
        <PrimaryButton
          class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
          ><svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
            />
          </svg>
        </PrimaryButton>
      </form>
    </td>
  </tr>
  <!-- :href="route('products.destroy', product.id)" -->
</template>

