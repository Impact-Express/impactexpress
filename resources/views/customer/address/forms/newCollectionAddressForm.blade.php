<form method="POST" action="{{ route("new-address") }}" aria-label="{{ __('Add New Collection Address') }}">
    @csrf
    <div class="k-content">
        <ul class="fieldlist">
            <!-- CONTACT TITLE -->
            <li>
                <label for="contact_title-1">{{ __('Contact Title') }}</label>
                <input id="contact_title-1" type="text" class="k-textbox form-control{{ $errors->has('contact_title.1') ? ' is-invalid' : '' }}" name="contact_title[1]" value="{{ old('contact_title.1') }}">

                @if ($errors->has('contact_title.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('contact_title.1')) }}</strong>
                    </span>
                @endif
            </li>

            <!-- CONTACT FIRST NAME -->
            <li>
                <label for="contact_first_name-1">{{ __('Contact First Name') }}</label>
                <input id="contact_first_name-1" type="text" class="k-textbox form-control{{ $errors->has('contact_first_name.1') ? ' is-invalid' : '' }}" name="contact_first_name[1]" value="{{ old('contact_first_name.1') }}">

                @if ($errors->has('contact_first_name.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('contact_first_name.1')) }}</strong>
                    </span>
                @endif
            </li>

            <!-- CONTACT LAST NAME -->
            <li>
                <label for="contact_last_name-1">{{ __('Contact Last Name') }}</label>
                <input id="contact_last_name-1" type="text" class="k-textbox form-control{{ $errors->has('contact_last_name.1') ? ' is-invalid' : '' }}" name="contact_last_name[1]" value="{{ old('contact_last_name.1') }}">

                @if ($errors->has('contact_last_name.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('contact_last_name.1')) }}</strong>
                    </span>
                @endif
            </li>

            <!-- COMPANY NAME -->
            <li>
                <label for="company_name-1">{{ __('Company Name') }}</label>
                <input id="company_name-1" type="text" class="k-textbox form-control{{ $errors->has('company_name.1') ? ' is-invalid' : '' }}" name="company_name[1]" value="{{ old('company_name.1') }}">

                @if ($errors->has('company_name.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('company_name.1')) }}</strong>
                    </span>
                @endif
            </li>

            <!-- HOME PHONE -->
            <li>
                <label for="home_phone-1">{{ __('Home Telephone') }}</label>
                <input id="home_phone-1" type="text" class="k-textbox form-control{{ $errors->has('home_phone.1') ? ' is-invalid' : '' }}" name="home_phone[1]" value="{{ old('home_phone.1') }}">

                @if ($errors->has('home_phone.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('home_phone.1')) }}</strong>
                    </span>
                @endif
            </li>

            <!-- WORK PHONE -->
            <li>
                <label for="work_phone-1">{{ __('Work Telephone') }}</label>
                <input id="work_phone-1" type="text" class="k-textbox form-control{{ $errors->has('work_phone.1') ? ' is-invalid' : '' }}" name="work_phone[1]" value="{{ old('work_phone.1') }}">

                @if ($errors->has('work_phone.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('work_phone.1')) }}</strong>
                    </span>
                @endif
            </li>

            <!-- MOBILE PHONE -->
            <li>
                <label for="mobile_phone-1">{{ __('Mobile Telephone') }}</label>
                <input id="mobile_phone-1" type="text" class="k-textbox form-control{{ $errors->has('mobile_phone.1') ? ' is-invalid' : '' }}" name="mobile_phone[1]" value="{{ old('mobile_phone.1') }}">

                @if ($errors->has('mobile_phone.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('mobile_phone.1')) }}</strong>
                    </span>
                @endif
            </li>

            <!-- ADDRESS LINE 1 -->
            <li>
                <label for="line_1-1">{{ __('Line 1 *') }}</label>
                <input id="line_1-1" type="text" class="k-textbox form-control{{ $errors->has('line_1.1') ? ' is-invalid' : '' }}" name="line_1[1]" value="{{ old('line_1.1') }}" required>

                @if ($errors->has('line_1.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('line_1.1')) }}</strong>
                    </span>
                @endif
            </li>

            <!-- ADDRESS LINE 2 -->
            <li>
                <label for="line_2-1">{{ __('Line 2') }}</label>
                <input id="line_2-1" type="text" class="k-textbox form-control{{ $errors->has('line_2.1') ? ' is-invalid' : '' }}" name="line_2[1]" value="{{ old('line_2.1') }}">

                @if ($errors->has('line_2.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('line_2.1')) }}</strong>
                    </span>
                @endif
            </li>

            <!-- ADDRESS LINE 3 -->
            <li>
                <label for="line_3-1">{{ __('Line 3') }}</label>
                <input id="line_3-1" type="text" class="k-textbox form-control{{ $errors->has('line_3.1') ? ' is-invalid' : '' }}" name="line_3[1]" value="{{ old('line_3.1') }}">

                @if ($errors->has('line_3.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('line_3.1')) }}</strong>
                    </span>
                @endif
            </li>

            <!-- TOWN -->
            <li>
                <label for="town-1">{{ __('Town *') }}</label>
                <input id="town-1" type="text" class="k-textbox form-control{{ $errors->has('town.1') ? ' is-invalid' : '' }}" name="town[1]" value="{{ old('town.1') }}" required>

                @if ($errors->has('town.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('town.1')) }}</strong>
                    </span>
                @endif
            </li>

            <!-- COUNTRY ID -->
            <li>
                <label for="country_id-1">{{ __('Country *') }}</label>
                <input id="country_id-1" type="text" class="k-textbox form-control{{ $errors->has('country_id.1') ? ' is-invalid' : '' }}" name="country_id[1]" value="{{ old('country_id.1') }}" required>

                @if ($errors->has('country_id.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('country_id.1')) }}</strong>
                    </span>
                @endif
            </li>

            <!-- POSTCODE -->
            <li>
                <label for="postcode-1">{{ __('Postcode *') }}</label>
                <input id="postcode-1" type="text" class="k-textbox form-control{{ $errors->has('postcode.1') ? ' is-invalid' : '' }}" name="postcode[1]" value="{{ old('postcode.1') }}" required>

                @if ($errors->has('postcode.1'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ str_replace('.1', '', $errors->first('postcode.1')) }}</strong>
                    </span>
                @endif
            </li>

            <!-- ADDRESS TYPE ID -->
            <li>
                <input value="1" id="address_type_id-1" type="text" class="form-control{{ $errors->has('address_type_id.1') ? ' is-invalid' : '' }}" name="address_type_id[1]" required hidden>

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
                <button type="reset" class="k-button cancel-collection-address">
                    {{ __('Cancel') }}
                </button>
            </li>
        </ul>
    </div>
</form>