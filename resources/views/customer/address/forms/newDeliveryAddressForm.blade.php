<form method="POST" action="{{ route("new-address") }}" aria-label="{{ __('Add New Delivery Address') }}">
    @csrf
    <div class="k-content">
        <ul class="fieldlist">
            <li>
                <label for="contact_name-1">{{ __('Contact') }}</label>
                <input id="contact_name-1" type="text" class="k-textbox form-control{{ $errors->has('contact_name.1') ? ' is-invalid' : '' }}" name="contact_name[1]" value="{{ old('contact_name.1') }}">

                @if ($errors->has('contact_name.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('contact_name.1')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="company_name-1">{{ __('Company Name') }}</label>
                <input id="company_name-1" type="text" class="k-textbox form-control{{ $errors->has('company_name.1') ? ' is-invalid' : '' }}" name="company_name[1]" value="{{ old('company_name.1') }}">

                @if ($errors->has('company_name.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('company_name.1')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="line_1-1">{{ __('Line 1 *') }}</label>
                <input id="line_1-1" type="text" class="k-textbox form-control{{ $errors->has('line_1.1') ? ' is-invalid' : '' }}" name="line_1[1]" value="{{ old('line_1.1') }}" required>

                @if ($errors->has('line_1.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('line_1.1')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="line_2-1">{{ __('Line 2') }}</label>
                <input id="line_2-1" type="text" class="k-textbox form-control{{ $errors->has('line_2.1') ? ' is-invalid' : '' }}" name="line_2[1]" value="{{ old('line_2.1') }}">

                @if ($errors->has('line_2.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('line_2.1')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="line_3-1">{{ __('Line 3') }}</label>
                <input id="line_3-1" type="text" class="k-textbox form-control{{ $errors->has('line_3.1') ? ' is-invalid' : '' }}" name="line_3[1]" value="{{ old('line_3.1') }}">

                @if ($errors->has('line_3.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('line_3.1')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="town-1">{{ __('Town *') }}</label>
                <input id="town-1" type="text" class="k-textbox form-control{{ $errors->has('town.1') ? ' is-invalid' : '' }}" name="town[1]" value="{{ old('town.1') }}" required>

                @if ($errors->has('town.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('town.1')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="country-1">{{ __('Country *') }}</label>
                <input id="country-1" type="text" class="k-textbox form-control{{ $errors->has('country.1') ? ' is-invalid' : '' }}" name="country[1]" value="{{ old('country.1') }}" required>

                @if ($errors->has('country.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('country.1')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="postcode-1">{{ __('Postcode *') }}</label>
                <input id="postcode-1" type="text" class="k-textbox form-control{{ $errors->has('postcode.1') ? ' is-invalid' : '' }}" name="postcode[1]" value="{{ old('postcode.1') }}" required>

                @if ($errors->has('postcode.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('postcode.1')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="contact_phone-1">{{ __('Telephone') }}</label>
                <input id="contact_phone-1" type="text" class="k-textbox form-control{{ $errors->has('contact_phone.1') ? ' is-invalid' : '' }}" name="contact_phone[1]" value="{{ old('contact_phone.1') }}">

                @if ($errors->has('contact_phone.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('contact_phone.1')) }}</strong>
                    </span>
                @endif
            </li>

            <li>
                <input value="2" id="address_type_id-1" type="text" class="form-control{{ $errors->has('address_type_id.1') ? ' is-invalid' : '' }}" name="address_type_id[1]" required hidden>

                @if ($errors->has('address_type_id.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('address_type_id.1')) }}</strong>
                    </span>
                @endif
            </li>

            <li>
                <button type="submit" class="k-button k-primary">
                    {{ __('Add') }}
                </button>
                <button type="reset" class="k-button cancel-delivery-address">
                    {{ __('Cancel') }}
                </button>
            </li>
        </ul>
    </div>
</form>