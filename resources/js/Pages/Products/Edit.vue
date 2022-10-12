<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import Product from "@/Components/Product.vue";
import { defineProps, reactive, ref } from "vue";
import { defineComponent } from "vue";
import { useField } from "vee-validate";

const props = defineProps(["product"]);
console.log(props.product.id);

const form = useForm({
  id: props.product.id,
  name: props.product.name,
  code: props.product.code,
  price: props.product.price,
  image: props.product.image,
});
</script>
 
<template>
  <Head title="Products" />

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
        @submit.prevent="
          form.put(route('products.update', form.id), {
            onSuccess: () => form.reset(),
          })
        "
      >
        <input type="hidden" name="id" v-model="form.id" />
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
            v-mask="'#*'"
            required
          />
          <!-- <InputError class="mt-2" :message="form.errors.price" /> -->
        </div>
        <div class="mt-4">
          <InputLabel for="image" value="Imagem" />
          <TextInput
            id="image"
            type="file"
            class="mt-1 block w-full"
            v-model="product.image"
            required
            accept=".png, .jpg, .jpeg"
          />

        <!-- <InputError class="mt-2" :message="form.errors.image" /> -->
        <!-- </div> -->

        <!-- <InputError :message="form.errors.message" class="mt-2" /> -->
        <PrimaryButton class="mt-4">Atualizar</PrimaryButton>
      </form>
    </div>
  </AuthenticatedLayout>
</template>