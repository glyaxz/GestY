class Company {
  int? _id;
  String? _companyId;
  String? _companyRef;
  String? _companyName;
  String? _createdAt;
  String? _updatedAt;

  Company(
      {int? id,
        String? companyId,
        String? companyRef,
        String? companyName,
        String? createdAt,
        String? updatedAt}) {
    if (id != null) {
      this._id = id;
    }
    if (companyId != null) {
      this._companyId = companyId;
    }
    if (companyRef != null) {
      this._companyRef = companyRef;
    }
    if (companyName != null) {
      this._companyName = companyName;
    }
    if (createdAt != null) {
      this._createdAt = createdAt;
    }
    if (updatedAt != null) {
      this._updatedAt = updatedAt;
    }
  }

  int? get id => _id;
  set id(int? id) => _id = id;
  String? get companyId => _companyId;
  set companyId(String? companyId) => _companyId = companyId;
  String? get companyRef => _companyRef;
  set companyRef(String? companyRef) => _companyRef = companyRef;
  String? get companyName => _companyName;
  set companyName(String? companyName) => _companyName = companyName;
  String? get createdAt => _createdAt;
  set createdAt(String? createdAt) => _createdAt = createdAt;
  String? get updatedAt => _updatedAt;
  set updatedAt(String? updatedAt) => _updatedAt = updatedAt;

  Company.fromJson(Map<String, dynamic> json) {
    _id = json['id'];
    _companyId = json['company_id'];
    _companyRef = json['company_ref'];
    _companyName = json['company_name'];
    _createdAt = json['created_at'];
    _updatedAt = json['updated_at'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['id'] = this._id;
    data['company_id'] = this._companyId;
    data['company_ref'] = this._companyRef;
    data['company_name'] = this._companyName;
    data['created_at'] = this._createdAt;
    data['updated_at'] = this._updatedAt;
    return data;
  }
}