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
          form.post(route('products.store'), { onSuccess: () => form.reset() })
        "
      >
        <div>
          <InputLabel for="name" value="Name" />
          <TextInput
            id="name"
            type="text"
            class="mt-1 block w-full"
            v-model="form.name"
            required
            autofocus
          />
          <InputError class="mt-2" :message="form.errors.name" />
        </div>

        <div class="mt-4">
          <InputLabel for="code" value="Code" />
          <TextInput
            id="code"
            type="text"
            class="mt-1 block w-full"
            v-model="form.code"
            required
          />
          <InputError class="mt-2" :message="form.errors.price" />
        </div>
        <div class="mt-4">
          <InputLabel for="price" value="Price" />
          <TextInput
            id="price"
            type="text"
            class="mt-1 block w-full"
            v-model="form.price"
            v-mask="'#*'"
            required
          />
          <InputError class="mt-2" :message="form.errors.price" />
        </div>
        <div class="mt-4">
          <InputLabel for="image" value="Image" />
          <TextInput
            id="image"
            type="file"
            class="mt-1 block w-full"
            v-model="form.image"
            required
            accept=".png, .jpg, .jpeg"
          />
          <InputError class="mt-2" :message="form.errors.image" />
        </div>

        <InputError :message="form.errors.message" class="mt-2" />
        <PrimaryButton class="mt-4">Product</PrimaryButton>
      </form>

      <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
        <Product
          v-for="product in products"
          :key="product.id"
          :product="product"
        />
      </div>
    </div>
  </AuthenticatedLayout>
</template>