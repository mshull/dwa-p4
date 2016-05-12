<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-user font-dark"></i>
            <span class="caption-subject font-dark bold uppercase">Contact Information</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-scrollable">
            <table class="table table-bordered">
                <tbody>
                	<tr>
                		<th>First Name:</th>
                		<th>Last Name:</th>
                	</tr>
                	<tr>
                		<td id="edit-contact-first-name" data-name="first_name" data-url="/contact/update" data-type="text" data-pk="{{ $contact->id }}" data-placement="top" class="editable editable-click">{{ $contact->first_name }}</td>
                		<td id="edit-contact-last-name" data-name="last_name" data-url="/contact/update" data-type="text" data-pk="{{ $contact->id }}" data-placement="top" class="editable editable-click">{{ $contact->last_name }}</td>
                	</tr>
                		<th>Home Phone:</th>
                		<th>Work Phone:</th>
                	</tr>
                	<tr>
                		<td id="edit-contact-home-phone" data-name="home_phone" data-url="/contact/update" data-type="text" data-pk="{{ $contact->id }}" data-placement="top" class="editable editable-click">{{ ($contact->home_phone) ? $contact->home_phone : "&nbsp;" }}</td>
                		<td id="edit-contact-work-phone" data-name="word_phone" data-url="/contact/update" data-type="text" data-pk="{{ $contact->id }}" data-placement="top" class="editable editable-click">{{ ($contact->work_phone) ? $contact->work_phone : "&nbsp;" }}</td>
                	</tr>
                	<tr>
                		<th>Mobile Phone:</th>
                		<th>Emergency Contact:</th>
                	</tr>
                	<tr>
                		<td id="edit-contact-mobile-phone" data-name="mobile_phone" data-url="/contact/update" data-type="text" data-pk="{{ $contact->id }}" data-placement="top" class="editable editable-click">{{ ($contact->mobile_phone) ? $contact->mobile_phone : "&nbsp;" }}</td>
                		<td id="edit-contact-emergency-phone" data-name="emergency_phone" data-url="/contact/update" data-type="text" data-pk="{{ $contact->id }}" data-placement="top" class="editable editable-click">{{ ($contact->emergency_phone) ? $contact->emergency_phone : "&nbsp;" }}</td>
                	</tr>
                	<tr>
                        <th>Address</th>
                        <th>Address 2</th>
                    </tr>
                	<tr>
                		<td id="edit-contact-address" data-name="address" data-url="/contact/update" data-type="text" data-pk="{{ $contact->id }}" data-placement="top" class="editable editable-click">{{ ($contact->address) ? $contact->address : "&nbsp;" }}</td>
                        <td id="edit-contact-address-more" data-name="address_more" data-url="/contact/update" data-type="text" data-pk="{{ $contact->id }}" data-placement="top" class="editable editable-click">{{ ($contact->address_more) ? $contact->address_more : "&nbsp;" }}</td>
                	</tr>
                	<tr>
                		<th>City:</th>
                		<th>State:</th>
                	</tr>
                	<tr>
                		<td id="edit-contact-city" data-name="city" data-url="/contact/update" data-type="text" data-pk="{{ $contact->id }}" data-placement="top" class="editable editable-click">{{ ($contact->city) ? $contact->city : "&nbsp;" }}</td>
                		<td id="edit-contact-state" data-name="state" data-url="/contact/update" data-type="text" data-pk="{{ $contact->id }}" data-placement="top" class="editable editable-click">{{ ($contact->state) ? $contact->state : "&nbsp;" }}</td>
                	</tr>
                	</tr>
                		<th>Zip Code:</th>
                		<th>Email:</th>
                	</tr>
                	<tr>
                		<td id="edit-contact-postal-code" data-name="postal_code" data-url="/contact/update" data-type="text" data-pk="{{ $contact->id }}" data-placement="top" class="editable editable-click">{{ ($contact->postal_code) ? $contact->postal_code : "&nbsp;" }}</td>
                		<td id="edit-contact-email" data-name="email" data-url="/contact/update" data-type="text" data-pk="{{ $contact->id }}" data-placement="top" class="editable editable-click">{{ ($contact->email) ? $contact->email : "&nbsp;" }}</td>
                	</tr>
                	</tr>
                		<th>Birth Year:</th>
                		<th></th>
                	</tr>
                	<tr>
                		<td id="edit-contact-birth-year" data-name="birth_year" data-url="/contact/update" data-type="text" data-pk="{{ $contact->id }}" data-placement="top" class="editable editable-click">{{ ($contact->birth_year) ? $contact->birth_year : "&nbsp;" }}</td>
                		<td></td>
                	</tr>
                </tbody>
            </table>
        </div>
    </div>
</div>