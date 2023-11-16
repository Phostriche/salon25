<template>
    <div>
      <h1>Ticket2</h1>
     
    </div>
  </template>
  
  <script>
  export default {
    name: "Ticket",
    data() {
      return {
        ticket: [],
      };
    },
    methods: {
      removeFromTicket(itemId) {
        const ticketItems = JSON.parse(localStorage.getItem("ticket"));
        const index = ticketItems.findIndex(({ id }) => id === itemId);
        ticketItems.splice(index, 1);
        localStorage.setItem("ticket", JSON.stringify(ticketItems));
        this.ticket = JSON.parse(localStorage.getItem("ticket"));
      },
      getTicket() {
        if (!localStorage.getItem("ticket")) {
          localStorage.setItem("ticket", JSON.stringify([]));
        }
        this.ticket = JSON.parse(localStorage.getItem("ticket"));
      },
    },
    beforeMount() {
      this.getTicket();
    },
  };
  </script>