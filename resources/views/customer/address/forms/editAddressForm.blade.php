<form method="POST" action="{{route('update-address', ['address' => $address->uuid])}}" aria-label="{{ __('Edit Address') }}">
    @method('PATCH')
    @csrf
    <div class="k-content">
        <ul class="fieldlist">
            <li>
                <label for="contact_name-{{$n}}">{{ __('Contact') }}</label>

                <div>
                    <input id="contact_name-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('contact_name.'.$n) ? ' is-invalid' : '' }}" name="contact_name[{{$n}}]" value="{{ $address->contact_name }}">

                    @if ($errors->has('contact_name.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('contact_name.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>

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

            <li>
                <label for="line_2-{{$n}}">{{ __('Line 2') }}</label>

                <div>
                    <input id="line_2-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('line_2.'.$n) ? ' is-invalid' : '' }}" name="line_2[{{$n}}]" value="{{ $address->line_2 }}">

                    @if ($errors->has('line_2.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('line_2.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>

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

            <li>
                <label for="country-{{$n}}">{{ __('Country') }}</label>

                <div>
                    <input id="country-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('country.'.$n) ? ' is-invalid' : '' }}" name="country[{{$n}}]" value="{{ $address->country_id }}">

                    @if ($errors->has('country.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('country.'.$n) }}</strong>
                        </span>
                    @endif
                </div>
            </li>

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
                <label for="contact_phone-{{$n}}">{{ __('Telephone') }}</label>

                <div>
                    <input id="contact_phone-{{$n}}" type="text" class="k-textbox form-control{{ $errors->has('contact_phone.'.$n) ? ' is-invalid' : '' }}" name="contact_phone[{{$n}}]" value="{{ $address->contact_phone }}">

                    @if ($errors->has('contact_phone.'.$n))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('contact_phone.'.$n) }}</strong>
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