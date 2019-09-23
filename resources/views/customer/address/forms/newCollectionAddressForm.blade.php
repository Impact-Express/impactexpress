<form method="POST" action="{{ route("new-address") }}" aria-label="{{ __('Add New Collection Address') }}">
    @csrf
    <div class="k-content">
        <ul class="fieldlist">
            <li>
                <label for="contact_name-0">{{ __('Contact') }}</label>
                <input id="contact_name-0" type="text" class="k-textbox form-control{{ $errors->has('contact_name.0') ? ' is-invalid' : '' }}" name="contact_name[0]" value="{{ old('contact_name.0') }}">

                @if ($errors->has('contact_name.0'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.0', '', $errors->first('contact_name.0')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="company_name-0">{{ __('Company Name') }}</label>
                <input id="company_name-0" type="text" class="k-textbox form-control{{ $errors->has('company_name.0') ? ' is-invalid' : '' }}" name="company_name[0]" value="{{ old('company_name.0') }}">

                @if ($errors->has('company_name.0'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.0', '', $errors->first('company_name.0')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="line_1-0">{{ __('Line 1 *') }}</label>
                <input id="line_1-0" type="text" class="k-textbox form-control{{ $errors->has('line_1.0') ? ' is-invalid' : '' }}" name="line_1[0]" value="{{ old('line_1.0') }}" required>

                @if ($errors->has('line_1.0'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.0', '', $errors->first('line_1.0')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="line_2-0">{{ __('Line 2') }}</label>
                <input id="line_2-0" type="text" class="k-textbox form-control{{ $errors->has('line_2.0') ? ' is-invalid' : '' }}" name="line_2[0]" value="{{ old('line_2.0') }}">

                @if ($errors->has('line_2.0'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.0', '', $errors->first('line_2.0')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="line_3-0">{{ __('Line 3') }}</label>
                <input id="line_3-0" type="text" class="k-textbox form-control{{ $errors->has('line_3.0') ? ' is-invalid' : '' }}" name="line_3[0]" value="{{ old('line_3.0') }}">

                @if ($errors->has('line_3.0'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.0', '', $errors->first('line_3.0')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="town-0">{{ __('Town *') }}</label>
                <input id="town-0" type="text" class="k-textbox form-control{{ $errors->has('town.0') ? ' is-invalid' : '' }}" name="town[0]" value="{{ old('town.0') }}" required>

                @if ($errors->has('town.0'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.0', '', $errors->first('town.0')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="country-0">{{ __('Country *') }}</label>
                <input id="country-0" type="text" class="k-textbox form-control{{ $errors->has('country.0') ? ' is-invalid' : '' }}" name="country[0]" value="{{ old('country.0') }}" required>

                @if ($errors->has('country.0'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.0', '', $errors->first('country.0')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="postcode-0">{{ __('Postcode *') }}</label>
                <input id="postcode-0" type="text" class="k-textbox form-control{{ $errors->has('postcode.0') ? ' is-invalid' : '' }}" name="postcode[0]" value="{{ old('postcode.0') }}" required>

                @if ($errors->has('postcode.0'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.0', '', $errors->first('postcode.0')) }}</strong>
                    </span>
                @endif
            </li>


            <li>
                <label for="contact_phone-0">{{ __('Telephone') }}</label>
                <input id="contact_phone-0" type="text" class="k-textbox form-control{{ $errors->has('contact_phone.0') ? ' is-invalid' : '' }}" name="contact_phone[0]" value="{{ old('contact_phone.0') }}">

                @if ($errors->has('contact_phone.0'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.0', '', $errors->first('contact_phone.0')) }}</strong>
                    </span>
                @endif
            </li>

            <li>
                <input value="1" id="address_type_id-0" type="text" class="form-control{{ $errors->has('address_type_id.0') ? ' is-invalid' : '' }}" name="address_type_id[0]" required hidden>

                @if ($errors->has('address_type_id.0'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.0', '', $errors->first('address_type_id.0')) }}</strong>
                    </span>
                @endif
            </li>

            <li>
                <button type="submit" class="k-button k-primary">
                    {{ __('Add') }}
                </button>
                <button type="reset" class="k-button cancel-collection-address">
                    {{ __('Cancel') }}
                </button>
            </li>
        </ul>
    </div>
</form>