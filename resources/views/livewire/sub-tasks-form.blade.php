<form wire:submit.prevent="submit">
    <input type="hidden" wire:model="task_id">
    <!-- Description -->
    <div>
        <x-forms.text-area wire:model="description" color="blue" id="description" rows="4"
            placeholder="Description..." required extraClass="focus:border-blue-500"></x-forms.text-area>
    </div>

    <!-- Due Date -->
    <div class="w-full">
        <x-forms.input-label for="due_date" value="{{ __('Due Date (optional)') }}" />
        <x-forms.text-input wire:model="due_date" color="blue" type="date" id="due_date"
            extraClass="focus:border-blue-500"></x-forms.text-input>
    </div>

    <!-- Actions -->
    <div class="flex justify-start space-x-3">
        <x-forms.button wire:click="submit" color="green" type="submit">Add
            Milestones</x-forms.button>

    </div>
</form>
