@extends('layouts.master') @section('content')



    <section class="light-blue-bg3">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <form class="pb-5" data-parsley-validate="" id="contact-form">
                        <div class="col-9">
                            <h1 class="light-t pt-5 pb-4">{{ __('Select Your Subject') }}</h1>
                            <div class="row mb-3">
                                <div class="col-4 d-flex align-items-center radio-subject">
                                    <input type="radio" name="subject" id="complaints" value="{{ __('Complaints') }}"
                                        required data-parsley-error-message=" required." />
                                    <label for="complaints"
                                        class="blue-text text-uppercase font-xs">{{ __('Complaints') }}</label>
                                </div>
                                <div class="col-4 d-flex align-items-center radio-subject">
                                    <input type="radio" name="subject" id="suggestions" value="{{ __('Suggestions') }}"
                                        required data-parsley-error-message=" required." />
                                    <label for="suggestions"
                                        class="blue-text text-uppercase font-xs">{{ __('Suggestions') }}</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 d-flex align-items-center radio-subject">
                                    <input type="radio" name="subject" id="inquiries" value="{{ __('Inquiries') }}"
                                        required data-parsley-error-message=" required." />
                                    <label for="inquiries"
                                        class="blue-text text-uppercase font-xs">{{ __('Inquiries') }}</label>
                                </div>
                                <div class="col-4 d-flex align-items-center radio-subject">
                                    <input type="radio" name="subject" id="appreciation" value="{{ __('Appreciation') }}"
                                        required data-parsley-error-message=" required." />
                                    <label for="appreciation"
                                        class="blue-text text-uppercase font-xs">{{ __('Appreciation') }}</label>
                                </div>
                            </div>

                        </div>
                        <div class="col-9">
                            <h1 class="light-t pt-5 pb-4">{{ __('Fill In Your Details') }}
                            </h1>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="mb-2">
                                        <label for="name"
                                            class="blue-text text-uppercase font-xs">{{ __('Full Name') }}
                                        </label>
                                    </div>
                                    <div>
                                        <input type="text" name="name" id="name" class="w-100 input-contact"
                                            required data-parsley-error-message="Full Name is required." />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-2">
                                        <label for="phone"
                                            class="blue-text text-uppercase font-xs">{{ __('Phone Number') }}
                                        </label>
                                    </div>
                                    <div>
                                        <input type="text" name="phone" id="phone"
                                            class="w-100 input-contact only-num-field" required
                                            data-parsley-error-message="Phone Number is required." />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label for="email"
                                            class="blue-text text-uppercase font-xs">{{ __('Email') }}</label>
                                    </div>
                                    <div>
                                        <input type="email" name="email" id="email" class="w-100 input-contact"
                                            required
                                            data-parsley-error-message="Email is required and should be in valid format." />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">

                                    <div class="mb-2">
                                        <label for="location"
                                            class="blue-text text-uppercase font-xs">{{ __('Location') }}</label>
                                    </div>
                                    <!-- <div>
                                        <input type="text" name="location" id="location" class="w-100 input-contact"  />
                                    </div> -->
                                    <div class="form-group">
                                        <select class="form-control" type="location" name="location" id="location">
                                            <option class="input-contact" value="">{{ __('Choose one...') }}</option>
                                            <option class="input-contact" value="Damascus">{{ __('Damasscus') }}</option>
                                            <option class="input-contact" value="Rural Damascus">{{ __('Rural Damasscus') }}</option>
                                            <option class="input-contact" value="latakia">{{ __('Lattakia') }}</option>
                                            <option class="input-contact" value="Aleppo">{{ __('Aleppo') }}</option>
                                            <option class="input-contact" value="Homs">{{ __('Homs') }}</option>
                                            <option class="input-contact" value="Hama">{{ __('Hama') }}</option>
                                            <option class="input-contact" value="Deir ez-Zur">{{ __('Deir ez-Zur') }}</option>
                                            <option class="input-contact" value="Al-raqah">{{ __('Ar Raqqah') }}</option>
                                            <option class="input-contact" value="Daraa">{{ __('Daraa') }}</option>
                                            <option class="input-contact" value="As-Suwayda">{{ __('As Suwayda') }}</option>
                                            <option class="input-contact" value="Quneitra">{{ __('Quneitra') }}</option>
                                            <option class="input-contact" value="Al-Hasakah">{{ __('Al-Hasakah') }}</option>
                                            <option class="input-contact" value="Idlib">{{ __('Idlib') }}</option>
                                            <option class="input-contact" value="Tartous">{{ __('Tartus') }}</option>

                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h1 class="light-t pt-5 pb-4">{{ __('How would you like us to contact you?') }}</h1>
                            <div class="row mb-3">
                                <div class="col-4 d-flex align-items-center radio-subject">
                                    <input type="radio" name="contact-you" id="contact-you-email"
                                        value="{{ __('email') }}" checked />
                                    <label for="contact-you-email"
                                        class="blue-text text-uppercase font-xs">{{ __('email') }}
                                    </label>
                                </div>
                                <div class="col-4 d-flex align-items-center radio-subject">
                                    <input type="radio" name="contact-you" id="contact-you-phone"
                                        value="{{ __('phone') }}" />
                                    <label for="contact-you-phone"
                                        class="blue-text text-uppercase font-xs">{{ __('phone') }}
                                    </label>
                                </div>
                            </div>
                            <h1 class="light-t pt-5 pb-4">{{ __('Write Your Message') }}
                            </h1>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label for="msg"
                                            class="blue-text text-uppercase font-xs">{{ __('Message') }}
                                        </label>
                                    </div>
                                    <div>
                                        <textarea name="msg" id="msg" class="textarea-contact w-100" required
                                            data-parsley-error-message="Message is required."> </textarea>
                                    </div>
                                </div>
                            </div>

                            <button class="d-flex my-4 justify-content-end contact-submit">
                                <h2 class="apply-font blue-text">{{ __('Submit') }}</h2>
                                <img class="arrow-icon" src="/img/svg/right-b-arrow.svg" alt="Card image cap" />
                            </button>
                        </div>

                    </form>

                    <div id="email-response-popup" style="display: none">
                        <button class="close-response-popup">
                          <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                        <div class="response-popup-container">
                          <div class="align-self-center w-100 text-center">
                            <div class="response-popup-loader">
                              <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                            </div>
                            <div class="response-popup-corect response-popup-content">
                              <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                  <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                  <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                              </svg>
                              <h1 class="light-t pt-4">{{__('Thank you for contacting us, you will be notified on the status within 2 working days.')}}</h1>
                            </div>
                            <div class="response-popup-error response-popup-content">
                              <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                              <circle class="checkmark_circle" cx="26" cy="26" r="25" fill="none" stroke="transparent" />
                              <path class="checkmark_check" fill="none" d="M14.1 14.1l23.8 23.8 m0,-23.8 l-23.8,23.8" />
                            </svg>
                            <h1 class="light-t pt-4">{{__('Something went wrong, please try again.')}}</h1>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="light-blue-bg2 px-5 h-100 pb-5">
                        <h1 class="light-t pt-5 pb-4">{{ __('Email Us') }}
                        </h1>
                        <p class="font-md">
                            {{ __('We are here to support you. You can reach us all day everyday on +963 934 550 527 or write to us on:') }}
                            <a href="mailto:ali6721985@gmail.com" class="y-text">ali6721985@gmail.com</a></p>
                        <h1 class="light-t pt-5 pb-4">{{ __('We are in Damascus') }}
                        </h1>
                        <div class="d-flex">
                            <div class="icon-ap">
                                <i class="fa fa-map-marker blue-text icon-contact" aria-hidden="true"></i>
                            </div>
                            <div class="w-75">
                                <p class="font-md">
                                    {{ __('F6RV+JVH, Damascus, Syria') }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="icon-ap">
                                <i class="fa fa-phone blue-text icon-contact" aria-hidden="true"></i>
                            </div>
                            <div>
                                <p class="font-md">{{ __('+963 934 550 527') }}</p>
                            </div>
                        </div>

                        <div class="d-flex mb-3">
                            <div class="icon-ap">
                                <i class="fa fa-phone blue-text icon-contact" aria-hidden="true"></i>
                            </div>
                            <div>
                                <p class="font-md">{{ __('Recovery & Follow up Unit:') }}<br>{{ __('+963 930 761 786') }}<br>{{__('+963 953 591 336')}}
                                </p>
                                <p class="font-md"></p>
                            </div>
                        </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
