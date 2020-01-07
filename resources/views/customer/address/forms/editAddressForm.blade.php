<form method="POST" action="{{route('update-address', ['address' => $address->uuid])}}" aria-label="{{ __('Edit Address') }}">
    @method('PATCH')
    @csrf
    <div class="k-content">
        <ul class="fieldlist">
            <!-- CONTACT TITLE -->
            <li>
                <label for="contact_title-{{$n}}">{{ __('Contact Title') }}</label>

                <div>
                    <input id="contact_title-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('contact_title.'.$n) ? ' is-invalid' : '' }}" name="contact_title[{{$n}}]" value="{{ $address->contact_title }}">

                    @if ($errors->has('contact_title.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('contact_title.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>

            <!-- CONTACT FIRST NAME -->
            <li>
                <label for="contact_first_name-{{$n}}">{{ __('Contact First Name') }}</label>

                <div>
                    <input id="contact_first_name-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('contact_first_name.'.$n) ? ' is-invalid' : '' }}" name="contact_first_name[{{$n}}]" value="{{ $address->contact_first_name }}">

                    @if ($errors->has('contact_first_name.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('contact_first_name.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>

            <!-- CONTACT LAST NAME -->
            <li>
                <label for="contact_last_name-{{$n}}">{{ __('Contact Last Name') }}</label>

                <div>
                    <input id="contact_last_name-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('contact_last_name.'.$n) ? ' is-invalid' : '' }}" name="contact_last_name[{{$n}}]" value="{{ $address->contact_last_name }}">

                    @if ($errors->has('contact_last_name.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('contact_last_name.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>

            <!-- COMPANY NAME -->
            <li>
                <label for="company_name-{{$n}}">{{ __('Company Name') }}</label>

                <div>
                    <input id="company_name-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('company_name.'.$n) ? ' is-invalid' : '' }}" name="company_name[{{$n}}]" value="{{ $address->company_name }}">

                    @if ($errors->has('company_name.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('company_name.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>

            <!-- HOME PHONE -->
            <li>
                <label for="home_phone-{{$n}}">{{ __('Home Phone') }}</label>

                <div>
                    <input id="home_phone-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('home_phone.'.$n) ? ' is-invalid' : '' }}" name="home_phone[{{$n}}]" value="{{ $address->home_phone }}">

                    @if ($errors->has('home_phone.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('home_phone.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>

            <!-- WORK PHONE -->
            <li>
                <label for="work_phone-{{$n}}">{{ __('Work Phone') }}</label>

                <div>
                    <input id="work_phone-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('work_phone.'.$n) ? ' is-invalid' : '' }}" name="work_phone[{{$n}}]" value="{{ $address->work_phone }}">

                    @if ($errors->has('work_phone.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('work_phone.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>

            <!-- MOBILE PHONE -->
            <li>
                <label for="mobile_phone-{{$n}}">{{ __('Mobile Phone') }}</label>

                <div>
                    <input id="mobile_phone-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('mobile_phone.'.$n) ? ' is-invalid' : '' }}" name="mobile_phone[{{$n}}]" value="{{ $address->mobile_phone }}">

                    @if ($errors->has('mobile_phone.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mobile_phone.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>

            <!-- ADDRESS LINE 1 -->
            <li>
                <label for="line_1-{{$n}}">{{ __('Line 1') }}</label>

                <div>
                    <input id="line_1-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('line_1.'.$n) ? ' is-invalid' : '' }}" name="line_1[{{$n}}]" value="{{ $address->line_1 }}">

                    @if ($errors->has('line_1.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('line_1.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>

            <!-- ADDRESS LINE 2 -->
            <li>
                <label for="line_1-{{$n}}">{{ __('Line 2') }}</label>

                <div>
                    <input id="line_2-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('line_2.'.$n) ? ' is-invalid' : '' }}" name="line_2[{{$n}}]" value="{{ $address->line_2 }}">

                    @if ($errors->has('line_2.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('line_2.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>

            <!-- ADDRESS LINE 3 -->
            <li>
                <label for="line_3-{{$n}}">{{ __('Line 3') }}</label>

                <div>
                    <input id="line_3-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('line_3.'.$n) ? ' is-invalid' : '' }}" name="line_3[{{$n}}]" value="{{ $address->line_3 }}">

                    @if ($errors->has('line_3.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('line_3.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>

            <!-- TOWN -->
            <li>
                <label for="town-{{$n}}">{{ __('Town') }}</label>

                <div>
                    <input id="town-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('town.'.$n) ? ' is-invalid' : '' }}" name="town[{{$n}}]" value="{{ $address->town }}">

                    @if ($errors->has('town.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('town.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>

            <!-- COUNTRY ID -->
            <li>
                <label for="country_id-{{$n}}">{{ __('Country') }}</label>

                <div>
                    <input id="country_id-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('country_id.'.$n) ? ' is-invalid' : '' }}" name="country_id[{{$n}}]" value="{{ $address->country_id }}">

                    @if ($errors->has('country_id.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('country_id.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>

            <!-- POSTCODE -->
            <li>
                <label for="postcode-{{$n}}">{{ __('Postcode') }}</label>

                <div>
                    <input id="postcode-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('postcode.'.$n) ? ' is-invalid' : '' }}" name="postcode[{{$n}}]" value="{{ $address->postcode }}">

                    @if ($errors->has('postcode.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('postcode.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>



            <li>
                <button type="submit" class="k-button k-primary">
                    {{ __('Update') }}
                </button>
                <button type="reset" class="k-button cancel-edit-address" id="cancel-edit-address-{{$n}}" data-n="{{$n}}">
                    {{ __('Cancel') }}
                </button>
            </li>
        </ul>
    </div>
</form>