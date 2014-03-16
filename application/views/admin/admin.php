<table>
    <tr>
        <th>Card Image</th>
        <th>Card Name</th>
        <th>Benefits</th>
        <th>Minimal Month Income</th>
        <th>First Year Cost</th>
        <th>Other Years Cost</th>
        <th>Life Period</th>
    </tr>
    <tbody id = "cards_container">
{cards}
<form method = "POST" action="/admin/change/{id}">
    <tr class="{class_type}" id = "card_{id}">
        <td class="image_url"><input type="text" name="image_url" value ="{image_url}"/></td>
        <td class="card_name"><input type="text" name="card_name" value="{card_name}"></td>
        <td class="benefits"><input type="text" name="benefits" value="{benefits}"></td>
        <td class="minimal_month_income"><input type="text" name="minimal_month_income" value ="{minimal_month_income}"></td>
        <td class="first_year_cost"><input type="text" name="first_year_cost" value ="{first_year_cost}"></td>
        <td class="others_years_cost"><input type="text" name="others_years_cost" value ="{others_years_cost}"></td>
        <td class="life_period"><input type="text" name="life_period" value ="{life_period}"></td>
        <td class="life_period"><input type="submit" value="save"></td>        
    </tr>
</form>
{/cards}
    </tbody>
</table>