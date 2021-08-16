<template>
  <Head title="Profile" />

  <div class="fixed left-0 py-2 pl-8 pr-32 text-xl font-semibold text-center text-white rounded-r-3xl top-24 bg-light-purple">Your Profile</div>

  <div class="flex flex-col items-center justify-center h-full pt-40 mt-40 md:mt-0 lg:items-start lg:space-x-6 lg:flex-row responsive-container">
    
    <!-- Profile Avatar -->
    <div class="flex flex-col items-center w-3/4 h-full p-4 space-y-2 bg-white border-4 rounded-t-full md:w-1/2 lg:w-1/6 border-dark-purple">
      <img :src="$page.props.auth.user.avatar" class="w-32 h-32" />
      <span class="text-xl font-semibold">{{ $page.props.auth.user.username }}</span>
      <span class="text-lg font-medium">{{ $page.props.auth.user.age ? $page.props.auth.user.age + ' Years Old' : 'Not Available' }}</span>
      <Link :href="route('profile.edit', { user: $page.props.auth.user })" class="button button-orange button-sm">Edit Profile</Link>
    </div>

    <!-- Profile Achievements -->
    <div class="w-3/4 h-full py-8 md:w-1/2 lg:w-2/3 lg:rounded-t-13xl bg-gradient-to-r from-dark-purple to-purple">
      <!-- Stars -->
      <div class="grid gap-4 sm:grid-cols-3 responsive-container">

        <!-- Gold -->
        <div class="flex flex-col items-center justify-center space-y-8">
          <img :src="$page.props.images.stars.gold" alt="Gold Star" class="w-16 h-16" />
          <div class="flex flex-col items-center justify-center space-y-4 text-white">
            <div class="font-semibold text-center bg-white text-light-purple rounded-3xl py-1.5 px-7 text-base ">2 Cities</div>
            <span>Lagos</span>
            <span>Benin-City</span>
          </div>
        </div>

        <!-- Silver -->
        <div class="flex flex-col items-center space-y-8">
          <img :src="$page.props.images.stars.silver" alt="Silver Star" class="w-16 h-16" />
          <div class="flex flex-col items-center justify-center space-y-4 text-white">
            <div class="font-semibold text-center bg-white text-light-purple rounded-3xl py-1.5 px-7 text-base ">1 City</div>
            <span>Kano</span>
          </div>
        </div>

        <!-- Bronze -->
        <div class="flex flex-col items-center space-y-8">
          <img :src="$page.props.images.stars.bronze" alt="Bronze Star" class="w-16 h-16" />
          <div class="flex flex-col items-center justify-center space-y-4 text-white">
            <div class="font-semibold text-center bg-white text-light-purple rounded-3xl py-1.5 px-7 text-base ">1 City</div>
            <span>Enugu</span>
          </div>
        </div>

      </div>
    </div>

  </div>
  
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeGuestLayout from '@/Layouts/Guest'
export default {
  layout: BreezeGuestLayout,
  components: {
    Head, 
    Link
  },
}
</script>