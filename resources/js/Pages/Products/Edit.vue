<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import Product from "@/Components/Product.vue";
import { defineProps } from "vue";

const props = defineProps(["product"]);

const form = useForm({
  id: props.product.id,
  name: props.product.name,
  code: props.product.code,
  price: props.product.price,
  image: "",
  _method: "PUT",
});

const handleFileObject = (e) => {
  form.image = e.target.files[0];
};
</script>
 
<template>
  <AuthenticatedLayout>
    <div
      class="
        max-w-2xl
        mx-auto
        p-4
        sm:p-6
        lg:p-8
        w-full
        sm:max-w-md
        mt-6
        px-6
        py-4
        bg-white
        shadow-md
        overflow-hidden
        sm:rounded-lg
      "
    >
      <form
        @submit.prevent="form.post(route('products.update', props.product.id))"
      >
        <input type="hidden" name="_method" value="PUT" />
        <div>
          <InputLabel for="name" value="Nome" />
          <TextInput
            id="name"
            type="text"
            class="mt-1 block w-full"
            v-model="form.name"
            required
            autofocus
          />
          <!-- <InputError class="mt-2" :message="form.errors.name" /> -->
        </div>

        <div class="mt-4">
          <InputLabel for="code" value="Código" />
          <TextInput
            id="code"
            type="text"
            class="mt-1 block w-full"
            v-model="form.code"
            required
          />
          <!-- <InputError class="mt-2" :message="form.errors.price" /> -->
        </div>
        <div class="mt-4">
          <InputLabel for="price" value="Preço" />
          <TextInput
            id="price"
            type="text"
            class="mt-1 block w-full"
            v-model="form.price"
            mask="currency"
            required
          />
          <!-- <InputError class="mt-2" :message="form.errors.price" /> -->
        </div>
        <div class="mt-4">
          <img
            id="showImage"
            v-if="product.image"
            :src="`/storage/${product.image}`"
            :alt="product.name"
            class="h-15 w-20 object-cover"
          />
        </div>
        <div class="mt-4">
          <InputLabel for="image" value="Imagem" />
          <TextInput
            id="image"
            type="file"
            class="mt-1 block w-full"
            accept=".png, .jpg, .jpeg"
            @input="form.image = $event.target.files[0]"
          />
          <InputError class="mt-2" :message="form.errors.image" />
        </div>
        <!-- <InputError class="mt-2" :message="form.errors.image" /> -->
        <!-- </div> -->

        <!-- <InputError :message="form.errors.message" class="mt-2" /> -->
        <PrimaryButton class="mt-4">Atualizar</PrimaryButton>
      </form>
    </div>
  </AuthenticatedLayout>
</template>