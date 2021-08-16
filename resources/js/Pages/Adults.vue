<template>
  <Head title="For Grown Ups" />

  <div class="fixed flex flex-col w-4/5 p-4 space-y-4 text-3xl font-semibold text-left text-white lg:w-3/5 lg:space-y-12 inset-x-8 md:ml-14 lg:ml-24 bg-purple rounded-3xl top-28 lg:left-14">
    <h1>Dear Parents and Teachers, </h1>
    <div class="flex flex-col items-start space-y-2 text-base font-light tracking-wider lg:space-y-6">
      <p>Tasty Delight is a cultural dimensional game aimed at teaching children about Nigerian meals to enable them become more interested and inquisitive about their heritage.</p>
      <p>The game uses a gamified approach whereby Children explore various Cities in Nigeria to become more conversant with what the natives eat.</p>
      <p>This interactive incentive can be used both at Home and in the Classroom.</p>
    </div>
    
  </div>

  <Characters />
  <!-- <div class="fixed w-5/6 h-3/4 left-20">
    <img :src="$page.props.images['adults-background']" class="object-cover object-center w-full cursor-default" />
  </div> -->
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import BreezeGuestLayout from '@/Layouts/Guest'
import Characters from '@/Components/Characters.vue'
export default {
  layout: BreezeGuestLayout,
  components: {
    Head,
    Characters
  }
}
</script>