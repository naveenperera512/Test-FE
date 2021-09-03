<template>
  <div>
        <div>
                <div>
                    <h4 class="header-title m-t-0">Profile Info</h4>
                    <p class="text-muted font-14 m-b-20">Change your personal information</p>

                        <div class="form-group row">
                            <label class="col-3 col-form-label">
                                Title
                            </label>
                            <div class="col-4">
                              <input id="title" type="text" name="title" class="form-control"  placeholder="Dr" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-3 col-form-label">
                                First Name
                            </label>
                            <div class="col-4">
                              <input id="first_name" type="text" name="first_name" class="form-control"  placeholder="Nik" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-3 col-form-label">
                                Last Name
                            </label>
                            <div class="col-4">
                              <input id="last_name" type="text" name="last_name" class="form-control"  placeholder="Patel" />
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <div class="col-9 offset-3">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="reset" class="btn btn-secondary m-l-5 ml-1">Cancel</button>
                            </div>
                        </div>
                </div>
        </div>
  </div>
</template>


<script>
import {
    required,
    email,
    minLength,
    sameAs,
    maxLength,
    minValue,
    maxValue,
    numeric,
    url,
    alphaNum,
} from 'vuelidate/lib/validators'

/**
 * Form Validation component
 */
export default {
    head() {
        return {
            title: `${this.title} | Minton - Nuxtjs Responsive Admin Dashboard Template`,
        };
    },
    data() {
        return {
            title: 'Form Validation',
            items: [{
                    text: 'Minton',
                    href: '/',
                },
                {
                    text: 'Forms',
                    href: '/',
                },
                {
                    text: 'Validation',
                    active: true,
                },
            ],

            form: {
                name: '',
                email: '',
                password: '',
                confirmPassword: '',
            },
            horizontal: {
                email: '',
                password: '',
                confirmPassword: '',
                website: '',
            },
            range: {
                minlen: '',
                maxlength: '',
                between: '',
                minval: '',
                maxval: '',
                rangeval: '',
                expr: '',
            },
            typeform: {
                name: '',
                password: '',
                confirmPassword: '',
                email: '',
                url: '',
                digit: '',
                number: '',
                alphanum: '',
                textarea: '',
            },
            submit: false,
            submitted: false,
            formsubmit: false,
            typesubmit: false,
        }
    },
    validations: {
        form: {
            name: {
                required
            },
            email: {
                required,
                email
            },
            password: {
                required,
                minLength: minLength(6)
            },
            confirmPassword: {
                required,
                sameAsPassword: sameAs('password')
            },
        },
        horizontal: {
            email: {
                required,
                email
            },
            password: {
                required,
                minLength: minLength(6)
            },
            confirmPassword: {
                required,
                sameAsPassword: sameAs('password')
            },
            website: {
                required,
                url
            },
        },
        range: {
            minlen: {
                required,
                minLength: minLength(6)
            },
            maxlength: {
                required,
                maxLength: maxLength(6)
            },
            between: {
                required,
                minLength: minLength(5),
                maxLength: maxLength(10)
            },
            minval: {
                required,
                minValue: minValue(6)
            },
            maxval: {
                required,
                maxValue: maxValue(6)
            },
            rangeval: {
                required,
                minValue: minValue(6),
                maxValue: maxValue(100)
            },
            expr: {
                required
            },
        },
        typeform: {
            name: {
                required
            },
            password: {
                required,
                minLength: minLength(6)
            },
            confirmPassword: {
                required,
                sameAsPassword: sameAs('password')
            },
            email: {
                required,
                email
            },
            url: {
                required,
                url
            },
            digit: {
                required,
                numeric
            },
            number: {
                required,
                numeric
            },
            alphanum: {
                required,
                alphaNum
            },
            textarea: {
                required
            },
        },
    },
    methods: {
        /**
         * Basic Form submit
         */
        handleSubmit(e) {
            this.submitted = true

            // stop here if form is invalid
            this.$v.$touch()
        },
        /**
         * Horizontal form submit
         */
        horizontalForm(e) {
            this.formsubmit = true
            // stop here if form is invalid
            this.$v.$touch()
        },
        /**
         * Range validation form submit
         */
        rangeform(e) {
            this.submit = true
            // stop here if form is invalid
            this.$v.$touch()
        },
        /**
         * Validation type submit
         */
        typeForm(e) {
            this.typesubmit = true
            // stop here if form is invalid
            this.$v.$touch()
        },
    },
    middleware: 'router-auth'
}
</script>
