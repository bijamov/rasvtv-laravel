<table class="min-w-full">
	<thead>
		<tr>
			<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">ID</th>
			<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Username</th>
			<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Fullname</th>
			<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Email</th>
			<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Address</th>
			<th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Phone</th>
			<th class="px-6 py-3 border-b-2 border-gray-300"></th>
		</tr>
	</thead>
	<tbody class="bg-white">
		@foreach ($clients as $client)
		<tr>
			<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
				<div class="flex items-center">
					<div>
						<div class="text-sm leading-5 text-gray-800">
							{{ $client->user_id }}
						</div>
					</div>
				</div>
			</td>
			<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
				<div class="text-sm leading-5 text-blue-900">
					{{ $client->username }}
				</div>
			</td>
			<td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
				{{ $client->first_name.' '.$client->last_name }}
			</td>
			<td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
				{{ $client->email }}
			</td>
			<td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
				{{ $client->address }}
			</td>
			<td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
				{{ $client->phone }}
			</td>
			<td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
				<button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">View Details</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
	<div>
		<p class="text-sm leading-5 text-blue-700">
			Showing
			<span class="font-medium">{{$clients->firstItem()}}</span>
			to
			<span class="font-medium">{{$clients->lastItem()}}</span>
			of
			<span class="font-medium">{{$clients->total()}}</span>
			results
		</p>
	</div>
	<div>
		@if($clients->hasPages())
		<nav class="relative z-0 inline-flex">
			<div>
				<a href="{{ $clients->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Previous" v-on:click.prevent="changePage(pagination.current_page - 1)">
					<svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
					</svg>
				</a>
			</div>
			<div>
				<?php
				$Cpage = $clients->currentPage();
				$last = $clients->lastPage();
				$Npage = $Cpage+1;
				$Ppage = $Cpage-1;
				?>
				<?php if($Cpage != 1) { ?>
				<?php if($Cpage != 1 AND $Cpage != 2) { ?>
				<a href="{{ $clients->url(1) }}" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-700 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">
					1
				</a>
				<span class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-700 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">. .</span>
				<?php } ?>
				<a href="{{ $clients->url($Ppage) }}" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-700 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">
					{{ $Ppage }}
				</a>
				<?php } ?>
				<a href="{{ $clients->url($clients->currentPage()) }}" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-black-900 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">
					{{$clients->currentPage()}}
				</a>
				<?php if($Cpage != $last) { ?>
				<a href="{{ $clients->url($Npage) }}" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-700 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">
					{{ $Npage }}
				</a>
				<?php if($Cpage != $last AND $Cpage != ($last - 1)) { ?>
				<span class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-700 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">. .</span>
				<a href="{{ $clients->url($last) }}" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-700 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">
					{{ $last }}
				</a>
				<?php } ?>
				<?php } ?>
			</div>
			<div v-if="pagination.current_page < pagination.last_page">
				<a href="{{ $clients->nextPageUrl() }}" class="-ml-px relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Next">
					<svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
					</svg>
				</a>
			</div>
		</nav>
		@endif
	</div>
</div>