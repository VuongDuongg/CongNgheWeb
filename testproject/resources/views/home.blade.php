<!-- Khai báo HTML cơ bản -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Task Management</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  <!-- JS riêng để xử lý validate -->
  <script src="scrips.js"></script>
</head>

<body>
<div class="container-lg py-5">
    <div class="card">
      <div class="header-box d-flex justify-content-between align-items-center px-4">
        <h4>Task Management</h4>
        <div>
          <!-- Nút xóa nhân viên được chọn -->
          <button>
            English
          </button>
          <!-- Nút mở modal thêm nhân viên -->
          <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="bi bi-plus-circle-fill"></i> Add Task
          </button>
        </div>
      </div>

      <div class="table-responsive px-4 pt-3">
        <table class="table align-middle table-striped table-hover">
          <thead>
            <tr>
              <th>TITLE</th> <!-- Checkbox chọn tất cả -->
              <th>ASSIGNEE</th>
              <th>EMAIL</th>
              <th>PHONE</th>
              <th>PRIOTITY</th>
              <th>STATUS</th>
              <th>ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Design website interface <br>Create mockup and UI</td>
              <td>Thomas Hardy</td>
              <td>thomashardy@mail.com</td>
              <td>(171) 555-2222</td>
              <td>High</td>
              <td>undefined</td>
              <td>
                <i class="bi bi-pencil-fill text-warning me-2"></i>
                <i class="bi bi-trash-fill text-danger"></i>
              </td>
            </tr>
             <tr>
              <td>Design website interface <br>Create mockup and UI</td>
              <td>Dominique Perrier</td>
              <td>dominiqueperrier@mail.com</td>
              <td>(313) 555-5735</td>
              <td>High</td>
              <td>undefined</td>
              <td>
                <i class="bi bi-pencil-fill text-warning me-2"></i>
                <i class="bi bi-trash-fill text-danger"></i>
              </td>
            </tr>
            <tr>
              <td>Design website interface <br>Create mockup and UI</td>
              <td>Maria Anders</td>
              <td>mariaanders@mail.com</td>
              <td>(503) 555-9931</td>
              <td>High</td>
              <td>undefined</td>
              <td>
                <i class="bi bi-pencil-fill text-warning me-2"></i>
                <i class="bi bi-trash-fill text-danger"></i>
              </td>
            </tr>
            <tr>
              <td>Design website interface <br>Create mockup and UI</td>
              <td>Fran Wilson</td>
              <td>franwilson@mail.com</td>
              <td>(204) 619-5731</td>
              <td>High</td>
              <td>undefined</td>
              <td>
                <i class="bi bi-pencil-fill text-warning me-2"></i>
                <i class="bi bi-trash-fill text-danger"></i>
              </td>
            </tr>
            <tr>
              <td>Design website interface <br>Create mockup and UI</td>
              <td>Martin Blank</td>
              <td>martinblank@mail.com</td>
              <td>(480) 631-2097</td>
              <td>High</td>
              <td>undefined</td>
              <td>
                <i class="bi bi-pencil-fill text-warning me-2"></i>
                <i class="bi bi-trash-fill text-danger"></i>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addModal" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content shadow">
        <form id="formAdd">
          <div class="modal-header border-0">
            <h5 class="modal-title" id="addModalLabel">Add Task</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body px-4">
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input type="text" name="name" class="form-control" />
            </div>
            <div class="mb-3">
              <label class="form-label">Assignee</label>
              <input type="text" name="name" class="form-control" />
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" />
            </div>
            <div class="mb-3">
              <label class="form-label">Address</label>
              <textarea class="form-control" name="address" rows="2"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Phone</label>
              <input type="text" name="phone" class="form-control" />
            </div>
          </div>
          <div class="modal-footer border-0">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
