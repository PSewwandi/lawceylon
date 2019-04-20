<template>
  <div class="feed" ref="feed">
    <ul v-if="contact">
      <li
        v-for="message in messages"
        :class="`message${message.to == contact.id ?  ' sent' : ' received'}`"
        :key="message.id"
      >
        <div class="text">{{message.text}}</div>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    contact: {
      required: true
    },
    messages: {
      type: Array,
      required: true
    }
  },

  methods: {
    scrollToBottom() {
      setTimeout(() => {
        this.$refs.feed.scrollTop =this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
      }, 50);
    }
  },

  watch: {
    messages(messages) {
      this.scrollToBottom();
    }, 
    contact(contact){
        this.scrollToBottom();
    }
  }
};
</script>

<style lang="scss" scoped>
  .received {
    text-align: right;

    .text {
      background: lightgreen;
    }
  }
  .sent {
    text-align: left;

    .text {
      background: lightblue;
    }
  }

  .feed {
    background: lightgrey;
    height: 100%;
    max-height: 470px;
    overflow: scroll;

    ul {
      list-style-type: none;
      padding: 5px;

      li {
        .text {
          max-width: 200px;
          border-radius: 5px;
          padding: 12px;
          display: inline-block;
        }
        .message {
          margin: 10px 0;
          width: 100%;
        }
      }
    }
  }
</style>

