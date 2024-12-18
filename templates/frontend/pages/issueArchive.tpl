{**
 * templates/frontend/pages/issueArchive.tpl
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2003-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @brief Display a list of recent issues.
 *
 * @uses $issues Array Collection of issues to display
 * @uses $prevPage int The previous page number
 * @uses $nextPage int The next page number
 * @uses $showingStart int The number of the first item on this page
 * @uses $showingEnd int The number of the last item on this page
 * @uses $total int Count of all published monographs
 *}
{capture assign="pageTitle"}
	{if $prevPage}
		{translate key="archive.archivesPageNumber" pageNumber=$prevPage+1}
	{else}
		{translate key="archive.archives"}
	{/if}
{/capture}
{include file="frontend/components/header.tpl" pageTitleTranslated=$pageTitle}

<style>
#search-container {
    margin: 20px 0;
    padding: 15px;
    background-color: #f5f5f5;
    border-radius: 5px;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center;
}

#search-input {
    flex: 1;
    min-width: 200px;
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

#search-button {
    padding: 8px 16px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.2s;
}

#search-button:hover {
    background-color: #0056b3;
}

#search-year,
#search-volume {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    min-width: 100px;
}

#search-year:focus,
#search-volume:focus,
#search-input:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 0 2px rgba(0,123,255,0.25);
}

@media (max-width: 768px) {
    #search-container {
        flex-direction: column;
        align-items: stretch;
    }
    
    #search-input,
    #search-button,
    #search-year,
    #search-volume {
        width: 100%;
    }
}
</style>

<div class="page page_issue_archive">
	{include file="frontend/components/breadcrumbs.tpl" currentTitle=$pageTitle}
	<h1>
		{$pageTitle|escape}
	</h1>

	{* No issues have been published *}
	{if empty($issues)}
		<p>{translate key="current.noCurrentIssueDesc"}</p>

	{* List issues *}
	{else}
		<div id="search-container">
			<input type="text" id="search-input" placeholder="Search by title, volume, number, or year">
			<button id="search-button">Search</button>
			<select id="search-year">
				{foreach from=$issuesByYear key="year" item="issues"}
					<option value="{$year}">{$year}</option>
				{/foreach}
			</select>
			<select id="search-volume">
				{foreach from=$volumes item="volume"}
					<option value="{$volume}">{$volume}</option>
				{/foreach}
			</select>
		</div>
		{foreach from=$issuesByYear key="year" item="issues"}
			<h2 class="issue-year">{$year}</h2>
			<ul class="issues_archive">
				{foreach from=$issues item="issue" name="issueLoop"}
					{if $smarty.foreach.issueLoop.last}
						<li class="issue-item" style="border-bottom: none;">
							{include file="frontend/objects/issue_summary.tpl" issue=$issue}
						</li>
					{else}
						<li class="issue-item">
							{include file="frontend/objects/issue_summary.tpl" issue=$issue}
						</li>
					{/if}
				{/foreach}
			</ul>
		{/foreach}

		{* Pagination *}
		{if $prevPage > 1}
			{capture assign=prevUrl}{url router=\PKP\core\PKPApplication::ROUTE_PAGE page="issue" op="archive" path=$prevPage}{/capture}
		{elseif $prevPage === 1}
			{capture assign=prevUrl}{url router=\PKP\core\PKPApplication::ROUTE_PAGE page="issue" op="archive"}{/capture}
		{/if}
		{if $nextPage}
			{capture assign=nextUrl}{url router=\PKP\core\PKPApplication::ROUTE_PAGE page="issue" op="archive" path=$nextPage}{/capture}
		{/if}
		{include
			file="frontend/components/pagination.tpl"
			prevUrl=$prevUrl
			nextUrl=$nextUrl
			showingStart=$showingStart
			showingEnd=$showingEnd
			total=$total
		}
	{/if}
</div>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const searchInput = document.getElementById('search-input');
		const searchButton = document.getElementById('search-button');
		const yearSelect = document.getElementById('search-year');
		const volumeSelect = document.getElementById('search-volume');
		const issueItems = document.querySelectorAll('.issue-item');
		const issueYears = document.querySelectorAll('.issue-year');
	
		// Search functionality
		function performSearch() {
			const searchTerm = searchInput.value.toLowerCase();
			const selectedYear = yearSelect.value;
			const selectedVolume = volumeSelect.value;
	
			// Hide all year headers initially
			issueYears.forEach(yearHeader => {
				yearHeader.style.display = 'none';
			});
	
			issueItems.forEach(item => {
				const title = item.querySelector('.title').textContent.toLowerCase();
				const year = item.closest('ul').previousElementSibling.textContent;
				const volumeInfo = item.querySelector('.volume')?.textContent.toLowerCase() || '';
				
				const matchesSearch = !searchTerm || title.includes(searchTerm) || volumeInfo.includes(searchTerm);
				const matchesYear = selectedYear === '' || year === selectedYear;
				const matchesVolume = selectedVolume === '' || volumeInfo.includes(selectedVolume.toLowerCase());
	
				if (matchesSearch && matchesYear && matchesVolume) {
					item.style.display = 'block';
					// Show the corresponding year header
					item.closest('ul').previousElementSibling.style.display = 'block';
				} else {
					item.style.display = 'none';
				}
			});
		}
	
		// Event listeners
		searchButton.addEventListener('click', performSearch);
		searchInput.addEventListener('keyup', function(event) {
			if (event.key === 'Enter') {
				performSearch();
			}
		});
	
		// Filter by year and volume
		yearSelect.addEventListener('change', performSearch);
		volumeSelect.addEventListener('change', performSearch);
	
		// Add empty option to selects
		function addEmptyOption(selectElement) {
			const emptyOption = document.createElement('option');
			emptyOption.value = '';
			emptyOption.textContent = 'All';
			selectElement.insertBefore(emptyOption, selectElement.firstChild);
			selectElement.value = '';
		}
	
		addEmptyOption(yearSelect);
		addEmptyOption(volumeSelect);
	});
</script>


{include file="frontend/components/footer.tpl"}
