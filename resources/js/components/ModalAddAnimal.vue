<template>
  <div v-if="animal" class="modal-mask">
    <div class="modal-wrapper">
      <div class="modal-container">
        <div class="modal-header">
          <slot name="header">
            <button class="modal-default-button" @click="$emit('cancelAnimal')">
              <img src="/images/close.svg" />
            </button>
          </slot>
        </div>
        <div class="modal-body">
          <slot name="body">
            <p>Тип питомца: {{ animal.title }}</p>
            <input v-model="title" type="text" placeholder="Имя" />
          </slot>
        </div>

        <div class="modal-footer">
          <slot name="footer">
            <button @click="submit">Сохранить</button>
          </slot>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      title: null,
    };
  },
  props: {
    animal: null,
  },
  watch: {
    animal(val) {
      if (val === null) {
        this.title = null;
      }
    },
  },
  methods: {
    submit() {
      var animal = {};

      animal.title = this.title;

      animal.animal_type_id = this.animal.id;

      this.$emit("newAnimal", animal);
    },
  },
};
</script>