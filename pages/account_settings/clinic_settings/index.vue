<template>
    <div>
        <div>
            <Users />
        </div>
        <div >
            <Teams />
        </div>
    </div>
</template>

<script>

import Users from "@/pages/account_settings/clinic_settings/users";
import Teams from "@/pages/account_settings/clinic_settings/teams";
export default {

    data() {
        return { 
            items: [
            ],
        }
    },
    components:{
        Users,
        Teams,
    },
    middleware: 'router-auth'
}
</script>