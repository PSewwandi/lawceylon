<template>
    <div class="profilechat-app">
        <profileConversation :contact='selectedContact' :messages = 'messages' @newmessage="saveMessage"/>
        <profielcontactlist :contacts ='contacts' @selected= "startConversationWith"/>
    </div>
</template>

<script>
    import '../bootstrap';
    import profileConversation from './profileConversation';
    import  profielcontactlist from './profielcontactlist';
    export default{
        props: {
            user:{
                type: Object,
                required: true
            }
        },
        data(){
            return{
                selectedContact:null,
                messages: [],
                contacts :[]

            }
        },
        mounted(){
            console.log(Echo);
            Echo.private(`messages.${this.user.id}`)
                .listen('ProfileNewMessage',(e)=>{
                    this.handleIncoming(e.message);
                })

            console.log(this.user);
            axios.get('/contacts')
                .then((response)=>{
                    console.log(response.data);
                        
                    this.contacts = response.data;
                })

            
        },
        methods:{
            startConversationWith(contact){
                this.updateUnreadCount(contact, true);
                axios.get(`/profileconversation/${contact.id}`)
                    .then((response)=>{
                        this.messages = response.data;
                        this.selectedContact = contact;
                    })
             },

            saveMessage(message){
                this.messages.push(message);
             },

             handleIncoming(message){
                 if(this.selectedContact && message.from == this.selectedContact.id){
                     this.saveMessage(message);
                     return;
                    
                 }
                 this.updateUnreadCount(message.from_contact, false);
             },

             updateUnreadCount(contact, reset){
                this.contacts = this.contacts.map((single)=>{
                    if(single.id !== contact.id){
                        return single;
                    }

                    if(reset){
                        single.unread = 0;
                    }else{
                        single.unread += 1;
                    }

                    return single;
                })
            }

        },
        components: {profileConversation, profielcontactlist }

    }
  
</script>

<style lang="scss" scoped>
    .profilechat-app{
        display: flex; 
    }
</style>


