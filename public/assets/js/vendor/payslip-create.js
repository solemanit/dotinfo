// Add Earnings Item
function addEarningsItem() {
    const container = document.getElementById('earningsContainer');
    const newItem = document.createElement('div');
    newItem.className = 'earnings-deductions-container mt-15';
    newItem.innerHTML = `
        <div class="row gy-15 earnings-item">
            <div class="col-md-6">
                <label class="form-label">Description</label>
                <input type="text" class="form-control earnings-description" placeholder="e.g. Basic Salary" required>
            </div>
            <div class="col-md-5">
                <label class="form-label">Amount</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-text text-muted"> <i class="ri-money-dollar-circle-line fs-20"></i>
                        </div>
                        <input type="number" class="form-control earnings-amount" placeholder="0.00" required>
                    </div>
                </div>
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <span class="remove-item-btn" onclick="removeEarningsItem(this)"><i class="ri-close-large-fill"></i></span>
            </div>
        </div>
    `;
    container.appendChild(newItem);
}

// Remove Earnings Item
function removeEarningsItem(element) {
    element.closest('.earnings-deductions-container').remove();
}

// Add Deductions Item
function addDeductionsItem() {
    const container = document.getElementById('deductionsContainer');
    const newItem = document.createElement('div');
    newItem.className = 'earnings-deductions-container mt-15';
    newItem.innerHTML = `
        <div class="row gy-15 deductions-item">
            <div class="col-md-6">
                <label class="form-label">Description</label>
                <input type="text" class="form-control deductions-description" placeholder="e.g. Income Tax" required>
            </div>
            <div class="col-md-5">
                <label class="form-label">Amount</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-text text-muted"> <i class="ri-money-dollar-circle-line fs-20"></i>
                        </div>
                        <input type="number" class="form-control deductions-amount" placeholder="0.00" required>
                    </div>
                </div>
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <span class="remove-item-btn" onclick="removeDeductionsItem(this)"><i class="ri-close-large-fill"></i></span>
            </div>
        </div>
    `;
    container.appendChild(newItem);
}

// Remove Deductions Item
function removeDeductionsItem(element) {
    element.closest('.earnings-deductions-container').remove();
}

// Add Leave Item
function addLeaveItem() {
    const container = document.getElementById('leaveContainer');
    const newItem = document.createElement('div');
    newItem.className = 'earnings-deductions-container mt-15';
    newItem.innerHTML = `
        <div class="row gy-15 leave-item">
            <div class="col-md-5">
                <label class="form-label">Leave Type</label>
                <input type="text" class="form-control leave-type" placeholder="e.g. Annual Leave">
            </div>
            <div class="col-md-2">
                <label class="form-label">Entitled</label>
                <input type="number" class="form-control leave-entitled" placeholder="0">
            </div>
            <div class="col-md-2">
                <label class="form-label">Availed</label>
                <input type="number" class="form-control leave-availed" placeholder="0">
            </div>
            <div class="col-md-2">
                <label class="form-label">Balance</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-text text-muted"> <i class="ri-money-dollar-circle-line fs-20"></i>
                        </div>
                        <input type="number" class="form-control leave-balance" placeholder="0" required>
                    </div>
                </div>
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <span class="remove-item-btn" onclick="removeLeaveItem(this)"><i class="ri-close-large-fill"></i></span>
            </div>
        </div>
    `;
    container.appendChild(newItem);
}

// Remove Leave Item
function removeLeaveItem(element) {
    element.closest('.earnings-deductions-container').remove();
}

// Reset Form
function resetForm() {
    document.getElementById('payslipForm').reset();
    document.getElementById('earningsContainer').innerHTML = `
        <div class="earnings-deductions-container mt-15">
            <div class="row gy-15 earnings-item">
                <div class="col-md-6">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control earnings-description" placeholder="e.g. Basic Salary" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Amount</label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-text text-muted"> <i class="ri-money-dollar-circle-line fs-20"></i>
                            </div>
                            <input type="number" class="form-control earnings-amount" placeholder="0.00" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <span class="remove-item-btn" onclick="removeEarningsItem(this)"><i class="ri-close-large-fill"></i></span>
                </div>
            </div>
        </div>
    `;
    document.getElementById('deductionsContainer').innerHTML = `
        <div class="earnings-deductions-container mt-15">
            <div class="row gy-15 deductions-item">
                <div class="col-md-6">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control deductions-description" placeholder="e.g. Income Tax" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Amount</label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-text text-muted"> <i class="ri-money-dollar-circle-line fs-20"></i>
                            </div>
                            <input type="number" class="form-control deductions-amoun" placeholder="0.00" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <span class="remove-item-btn" onclick="removeDeductionsItem(this)"><i
                            class="ri-close-large-fill"></i></span>
                </div>
            </div>
        </div>
    `;
    document.getElementById('leaveContainer').innerHTML = `
        <div class="earnings-deductions-container mt-15">
            <div class="row gy-15 leave-item">
                <div class="col-md-5">
                    <label class="form-label">Leave Type</label>
                    <input type="text" class="form-control leave-type" placeholder="e.g. Annual Leave">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Entitled</label>
                    <input type="number" class="form-control leave-entitled" placeholder="0">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Availed</label>
                    <input type="number" class="form-control leave-availed" placeholder="0">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Balance</label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-text text-muted"> <i class="ri-money-dollar-circle-line fs-20"></i>
                            </div>
                            <input type="number" class="form-control leave-balancet" placeholder="0" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <span class="remove-item-btn" onclick="removeLeaveItem(this)"><i class="ri-close-large-fill"></i></span>
                </div>
            </div>
        </div>
    `;
}

// Preview Payslip
function previewPayslip() {
    alert('Payslip preview functionality would be implemented here.\nThis would collect all form data and display it in the payslip format.');
    // In a real implementation, this would:
    // 1. Collect all form data
    // 2. Calculate totals
    // 3. Open a new window/tab with the payslip template populated with the data
    // 4. Or show a modal with the preview
}

// Form Submission
document.getElementById('payslipForm').addEventListener('submit', function (e) {
    e.preventDefault();
    alert('Payslip generation would be implemented here.\nThis would process the form data and generate the final payslip.');
    // In a real implementation, this would:
    // 1. Validate all data
    // 2. Calculate totals
    // 3. Generate PDF or printable HTML
    // 4. Optionally save to database
});