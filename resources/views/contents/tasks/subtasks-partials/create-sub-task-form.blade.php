<form x-data="subTaskForm('create', {{ $task->id }})" @submit.prevent="submit">
    <main class="space-y-3">
        <!-- Description -->
        <div>
            <x-forms.text-area color="blue" id="description" fieldName="description" x-model="form.description" rows="4"
                placeholder="Description..." extraClass="focus:border-blue-500"></x-forms.text-area>
            <x-forms.input-error :messages="$errors->get('description')" x-text="errors?.description?.[0]" class="mt-2" />
        </div>

        <!-- Due Date -->
        <div class="w-full">
            <x-forms.input-label for="due_date" value="{{ __('Due Date (optional)') }}" />
            <x-forms.text-input color="blue" type="date" id="due_date" fieldName="due_date" x-model="form.due_date"
                extraClass="focus:border-blue-500"></x-forms.text-input>
        </div>

        <!-- Actions -->
        <div class="pt-2">
            <x-forms.button color="green" type="submit">Add Milestones</x-forms.button>

        </div>
    </main>
</form>
