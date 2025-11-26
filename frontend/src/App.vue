<script setup lang="ts">
import { navLinkList} from "@/utilities/navLink.ts";
import  NavigationLink  from "@/components/UI/NavigationLink.vue";
import Button from "@/components/UI/Button.vue";
import ButtonLink from "@/components/UI/ButtonLink.vue";

const links = navLinkList

</script>
<template>

  <nav class="navigation">
    <p v-for="link in links" :key="link.text" >
      <NavigationLink :link="link.text" :href="link.link">{{link.text}}</NavigationLink>
    </p>
    <Button>clon</Button>
    <div>
      <button-link></button-link>
    </div>
  </nav>


</template>
<style lang="scss">

.navigation{
  display: flex;
  justify-content: space-between;
}
</style>
