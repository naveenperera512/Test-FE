<script>
/**
 * Search-results component
 */
export default {
    head() {
        return {
            title: `${this.title} `
        }
    },
    data() {
        return {
            title: 'Account Settings',
            items: [
            ],
        }
    },
    middleware: 'router-auth'
}
</script>

<template>
    <div>
    <PageHeader :title="title" :items="items" />

            <div class="search-result-box card">
                <div class="card-body">
                    <b-tabs nav-class="nav-bordered">
                        <b-tab active>
                            <template v-slot:title>
                                Profile
                            </template>
                            <div>
                                <Profile />
                            </div>
                        </b-tab>
                         <b-tab>
                            <template v-slot:title>
                                Clinic Settings
                            </template>
                            <div >
                               <ClinicSettings />
                            </div>
                        </b-tab>
                        <b-tab>
                            <template v-slot:title>
                                Account
                            </template>
                            <div>
                               <Account />
                            </div>
                        </b-tab>
                    </b-tabs>

                </div>
            </div>
    </div>
</template>

<script>

import Profile from "@/pages/account_settings/profile";
import ClinicSettings from "@/pages/account_settings/clinic_settings";
import Account from "@/pages/account_settings/account";
export default {
    head() {
        return {
            title: `${this.title} `
        }
    },
    data() {
        return {
            title: 'Account Settings',
            items: [
            ],
        }
    },
    components:{
        Profile,
        ClinicSettings,
        Account
    },
    middleware: 'router-auth'
}
</script>
